<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
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
        if (!empty($cek) && $status = "Guru") {
            $data['judul']      = 'PENGAJUAN GURU';
            $data['act'] = 2;

            $data['topbar'] 		= $this->load->view('topbar', $data, true);
			$data['menu']			= $this->load->view('menu_guru', $data, true);
			$data['rightsidebar']	= $this->load->view('rightsidebar', $data, true);
			$data['user_info']		= $this->load->view('guru_v/user_info',$data, true);
			$data['logindropdown'] 	= $this->load->view('tampilan_menu/logindropdown', $data, true);
        
            // $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
            // $data['sekolah']		= $this->model_guru->sekolah();
            $dat = array(
                'sekolah' => $this->model_user->sch()
            );
        // $this->load->view('tampilan_admin', $data);
            $this->form_validation->set_rules('nip','NIP','required');
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
            $data['halaman']    = $this->load->view('guru_v/pengajuan_guru',$dat, true);
            $this->load->view('t_beranda', $data);
            }else{
                echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
	}
}