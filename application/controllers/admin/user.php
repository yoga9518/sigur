<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_user','model_gambar'));
    }
	public function index()
	{
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Data User';
            $data['act'] = 4;

            // $dat = array(
            //         'data' => $this->model_user->tabel()
            //     );
            $dat['gambar'] = $this->model_user->view();

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            $data['halaman']    = $this->load->view('admin/user_v',$dat, true);
            // $this->load->view('tampilan_admin', $data);
            $this->load->view('t_beranda', $data);
        }else{
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
            // redirect("login");
        }
	}
	
	public function tambah()
    {
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Tambah Data User';
            $data['act'] = 4;


            $data['status'] = $this->model_user->status();

            // $dat = array(
            //     'data' => $this->model_user->user()
            //     );

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            // $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
            
        // $this->load->view('tampilan_admin', $data);
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
            $this->form_validation->set_rules('status','Status','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('alamat','Alamat','required');

            if ($this->form_validation->run() == TRUE)
            {
                // $this->load->view('myform');
                $this->model_user->create();
                redirect('admin/user', 'refresh');
            }
            $data['halaman']    = $this->load->view('admin/user_add',$data, true);
            $this->load->view('t_beranda', $data);
            }else{
                echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    // public function tambah_user(){
    //     $data['judul']      = 'Edit Data User';
    //     $data['act'] = 4;

    //     $dat = array(
    //             'data' => $this->model_user->user(),
    //             'status' => $this->model_user->status()
    //         );

    //     $data['topbar']     = $this->load->view('topbar', $data, true);
    //     $data['menu']       = $this->load->view('menu', $data, true);
    //     $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
    //     $data['user_info']  = $this->load->view('user_info',$data, true);
    //     $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
    //     // $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
        
    //     // $this->load->view('tampilan_admin', $data);
    //     $this->form_validation->set_rules('username','Username','required');
    //     $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
    //     // $this->form_validation->set_rules('status','Status','required');
    //     $this->form_validation->set_rules('email','Email','required');
    //     $this->form_validation->set_rules('alamat','Alamat','required');

    //     if ($this->form_validation->run() == TRUE)
    //     {
    //         // $this->load->view('myform');
    //         $this->model_user->create();
    //         redirect('halaman/user', 'refresh');
    //     }
    //     $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
    //     $this->load->view('t_beranda', $data);  
    

    public function delete($id_user)
    {
        $data = $this->model_user->ambil_id_gambar($id_user);
        // lokasi gambar berada
        $path = './gambar/';
        @unlink($path.$data->nama_file);// hapus data di folder dimana data tersimpan
        if ($this->model_user->delete_user($id_user) == TRUE) {
        // TAMPILKAN PESAN JIKA BERHASIL
            $res = $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">Data Berhasil di Hapus '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');
        }
        redirect('admin/user');
    }

    public function edit_user($id_user){
        
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Edit Data User';
            $data['act'] = 4;

        // $dat = array(
  //               'data' => $this->model_user->user()
  //           );
        // $where = array('id' => $id);
        // $data['hasil'] = $this->model_user->Getdata($where,'tbl_user')->result();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
=======
=======
>>>>>>> parent of b4c0ba2... permohonan
=======
>>>>>>> parent of b4c0ba2... permohonan
            $data['topbar']         = $this->load->view('topbar', $data, true);
            $data['menu']           = $this->load->view('menu', $data, true);
            $data['rightsidebar']   = $this->load->view('rightsidebar', $data, true);
            $data['user_info']      = $this->load->view('user_info',$data, true);
            $data['logindropdown']  = $this->load->view('tampilan_menu/logindropdown', $data, true);
>>>>>>> parent of b4c0ba2... permohonan

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
            $this->form_validation->set_rules('status','Status','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('alamat','Alamat','required');

            if ($this->form_validation->run() == TRUE)
            {
            // $this->load->view('myform');
                
                $this->model_user->edit($id_user, $this->input->post());
                redirect('admin/user', 'refresh');
            //$this->model_gambar->create();
            }
            $dat['status'] = $this->model_user->status();
            $dat['data'] = $this->model_user->getall($id_user)->result();
            $data['halaman']    = $this->load->view('admin/user_edit',$dat, true);
        // $this->load->view('tampilan_admin', $data);
            $this->load->view('t_beranda', $data);
            }       
        }


}
