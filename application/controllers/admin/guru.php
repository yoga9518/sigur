<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_guru','model_gambar'));
    }
	public function index()
	{
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {

            $data['judul']      = 'Data Guru';
            // $data['username']   = $this->session->userdata('username');
            // $data['nama_file']  = $this->session->userdata('nama_file');
            $data['act'] = 5;

            // $dat = array(
            //         'data' => $this->model_guru->tabel()
            //     );
            $dat['tabel'] = $this->model_guru->semua()->result();

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            $data['halaman']    = $this->load->view('admin/guru_v',$dat, true);
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
            $data['act'] = 5;

            $dat = array(
                // 'data'      => $this->model_guru->user(),
                'mapel'     => $this->model_guru->mapel(),
                'stguru'    => $this->model_guru->stguru(),
                'pend'      => $this->model_guru->pend(),
                'sekolah'   => $this->model_guru->sekolah(),
                // 'npsn'      => $this->model_guru->npsn(),
                );

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            // $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
            
        // $this->load->view('tampilan_admin', $data);
            $this->form_validation->set_rules('nip','NIPO','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('ttl','TTL','required');
            $this->form_validation->set_rules('gender','Gender','required');
            $this->form_validation->set_rules('mapel','Mata Pelajaran','required');
            $this->form_validation->set_rules('pend','Pendidikan','required');
            $this->form_validation->set_rules('stguru','Status Guru','required');
            // $this->form_validation->set_rules('sekolah','Asal Sekolah','required');
            $this->form_validation->set_rules('npsn','npsn','required');


            if ($this->form_validation->run() == TRUE)
            {
                // $this->load->view('myform');
                $this->model_guru->create();
                redirect('admin/guru', 'refresh');
            }
            $data['halaman']    = $this->load->view('admin/guru_add',$dat, true);
            $this->load->view('t_beranda', $data);
            }else{
                echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function edit_guru($id_guru){

        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Edit Data Guru';
            $data['act'] = 5;

            $data['topbar']     = $this->load->view('topbar', $data, true);
            $data['menu']       = $this->load->view('menu', $data, true);
            $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  = $this->load->view('user_info',$data, true);
            $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);

            $this->form_validation->set_rules('nip','NIP','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('ttl','TTL','required');
            $this->form_validation->set_rules('gender','Gender','required');
            $this->form_validation->set_rules('mapel','Mata Pelajaran','required');
            $this->form_validation->set_rules('pend','Pendidikan','required');
            $this->form_validation->set_rules('stguru','Status Guru','required');
            $this->form_validation->set_rules('npsn','npsn', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $this->model_guru->edit($id_guru, $this->input->post());
                redirect('admin/guru', 'refresh');
            }
            $dat = array(
                'mapel'     => $this->model_guru->mapel(),
                'pend'      => $this->model_guru->pend(),
                'stguru'    => $this->model_guru->stguru(),
                'sekolah'   => $this->model_guru->sekolah(),
                'data'      => $this->model_guru->getall($id_guru)->result(),
                );
            $data['halaman']    = $this->load->view('admin/guru_edit',$dat, true);
            $this->load->view('t_beranda', $data);
            }		
        }
    public function delete($id_user)
    {
        $this->model_guru->delete($id_user);
        redirect('admin/guru');
    }
}
