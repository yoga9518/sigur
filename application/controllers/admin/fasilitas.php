<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_fasilitas'));
    }
	public function index()
	{
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {

            $data['judul']	= 'Fasilitas';
            $data['act'] 	= 6;

            $dat['tabel'] 	= $this->model_fasilitas->view()->result();

            $data['topbar']     	= $this->load->view('topbar', $data, true);
            $data['menu']       	= $this->load->view('menu', $data, true);
            $data['rightsidebar']   = $this->load->view('rightsidebar', $data, true);
            $data['user_info']  	= $this->load->view('user_info',$data, true);
            $data['logindropdown'] 	= $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            $data['halaman']    	= $this->load->view('admin/fasilitas_v',$dat, true);
            // $this->load->view('tampilan_admin', $data);
            $this->load->view('t_beranda', $data);
        }else{
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
            // redirect("login");
        }
	}
	public function edit($id_sekolah){
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Edit Data Fasilitas';
            $data['act']        = 6;

            $data['topbar']         = $this->load->view('topbar', $data, true);
            $data['menu']           = $this->load->view('menu', $data, true);
            $data['rightsidebar']   = $this->load->view('rightsidebar', $data, true);
            $data['user_info']      = $this->load->view('user_info',$data, true);
            $data['logindropdown']  = $this->load->view('tampilan_menu/logindropdown', $data, true);

           // $this->form_validation->set_rules('npsn','NPSN','required');
           // $this->form_validation->set_rules('namasekolah','Nama Sekolah','required');
            $this->form_validation->set_rules('r_kelas','Ruang Kelas','required');
            $this->form_validation->set_rules('r_lab','Ruang Lab','required');
            $this->form_validation->set_rules('r_perpus','Ruang Perpus','required');

            if ($this->form_validation->run() == TRUE)
            {
            // $this->load->view('myform');
                $this->model_fasilitas->edit($id_sekolah, $this->input->post());
                redirect('admin/fasilitas', 'refresh');
                //$this->model_gambar->create();
            }
            $dat = array(
                // 'sekolah'   => $this->model_guru->fasilitas()
                // 'data'      => $this->model_guru->getall($id_guru)->result(),
                );   

            $dat['data'] = $this->model_fasilitas->getall($id_sekolah)->result();
            $data['halaman']    = $this->load->view('admin/fasilitas_edit',$dat, true);
        // $this->load->view('tampilan_admin', $data);
            $this->load->view('t_beranda', $data);
        }
    }
}