<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah_adm extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_guru','model_gambar'));
    }
    public function index()
	{
		$data['judul']	= 'Informasi Sekolah';
		$data['act'] 	= 3;

		$dat['tabel'] 	= $this->model_guru->semua()->result();

		$data['topbar'] 		= $this->load->view('topbar', $data, true);
		$data['menu']			= $this->load->view('menu_sch', $data, true);
		$data['rightsidebar']	= $this->load->view('rightsidebar', $data, true);
		$data['user_info']		= $this->load->view('sch_adm/user_info',$data, true);
		$data['logindropdown'] 	= $this->load->view('tampilan_menu/logindropdown', $data, true);

		$data['halaman']		= $this->load->view('sch_adm/sekolah_sch',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}
}