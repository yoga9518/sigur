<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_sekolah','model_gambar'));
    }
	public function index()
	{
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {

            $data['judul']      = 'Data Sekolah';
            $data['act'] = 2;

            $dat['tabel'] = $this->model_sekolah->view();

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            $data['halaman']    = $this->load->view('admin/sekolah_v',$dat, true);
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
            $data['judul']      = 'Tambah Data Guru';
            $data['act'] = 2;

           

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            // $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
            
        // $this->load->view('tampilan_admin', $data);
            $this->form_validation->set_rules('npsn','NPSN','required');
            $this->form_validation->set_rules('namasekolah','Nama Sekolah','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('lat','Latitute','required');
            $this->form_validation->set_rules('long','Longitute','required');

            if ($this->form_validation->run() == TRUE)
            {
                // $this->load->view('myform');
                $this->model_sekolah->create();
                redirect('admin/sekolah', 'refresh');
            }
            $data['halaman']    = $this->load->view('admin/sekolah_add',$data, true);
            $this->load->view('t_beranda', $data);
            }else{
                echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function edit($id_sekolah){
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Edit Data Sokolah';
            $data['act']        = 2;

            $data['topbar']         = $this->load->view('topbar', $data, true);
            $data['menu']           = $this->load->view('menu', $data, true);
            $data['rightsidebar']   = $this->load->view('rightsidebar', $data, true);
            $data['user_info']      = $this->load->view('user_info',$data, true);
            $data['logindropdown']  = $this->load->view('tampilan_menu/logindropdown', $data, true);

            $this->form_validation->set_rules('npsn','NPSN','required');
            $this->form_validation->set_rules('namasekolah','Nama Sekolah','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('lat','Latitute','required');
            $this->form_validation->set_rules('long','Longitute','required');

            if ($this->form_validation->run() == TRUE)
            {
                $this->model_sekolah->edit($id_sekolah, $this->input->post());
                redirect('admin/sekolah', 'refresh');
            }

            $dat['data'] = $this->model_sekolah->getall($id_sekolah)->result();
            $data['halaman']    = $this->load->view('admin/sekolah_edit',$dat, true);
        // $this->load->view('tampilan_admin', $data);
            $this->load->view('t_beranda', $data);
        }
    }
    public function delete($id_sekolah)
    {
        $this->model_sekolah->delete($id_sekolah);
        redirect('admin/sekolah');
    }
}