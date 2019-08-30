<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['judul'] 		= 'SIGUR - Sistem Informasi Guru';
		$data['act'] = 1;
		
		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['halaman']	= $this->load->view('halaman/beranda',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}
	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
                              'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				//$sess_data['uid'] = $sess->uid;
				$sess_data['username']      = $sess->username;
                                //$sess_data['pass']      = $sess->password;
                                //$sess_data['nama_lengkap']  = $sess->nama_lengkap;
                                //$sess_data['waktu_daftar']  = $sess->waktu_daftar;
				$sess_data['status']          = $sess->status;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('status')=='admin') {
				redirect('beranda',$sess_data);
			}
			elseif ($this->session->userdata('status')=='member') {
				redirect('member/c_member');
			}
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
}
