<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_user','model_gambar'));
    }
	public function index()
	{
		$data['judul'] 		= 'Beranda';
		$data['act'] = 1;

		$dat = array(
                'data' => $this->model_user->tabel()
            );

		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('admin/beranda_v',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}
	}