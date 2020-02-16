<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peta extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('upload','form_validation'));
        $this->load->helper(array('form','url','text','file'));
        $this->load->model(array('model_user','model_gambar'));
    }
public function index()

	{
		$data['judul'] 	= 'Peta Sebaran Guru';
		$data['act']    = 3;
        $data['marker'] = $this->model_user->peta()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/peta_v',$data);
		$this->load->view('template/footer');
    }
}