<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {
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

            $data['judul']  = 'Permohonan';
            $data['act']    = 7;

            $dat['tabel']   = $this->model_fasilitas->permohonan();

            $data['topbar']         = $this->load->view('topbar', $data, true);
            $data['menu']           = $this->load->view('menu', $data, true);
            $data['rightsidebar']   = $this->load->view('rightsidebar', $data, true);
            $data['user_info']      = $this->load->view('user_info', $data, true);
            $data['logindropdown']  = $this->load->view('tampilan_menu/logindropdown', $data, true);
<<<<<<< HEAD
<<<<<<< HEAD

            $data['halaman']        = $this->load->view('admin/permohonan_v', $dat, true);
=======
=======
>>>>>>> parent of b4c0ba2... permohonan
        
            $data['halaman']        = $this->load->view('admin/permohonan_v',$dat, true);
>>>>>>> parent of b4c0ba2... permohonan
            // $this->load->view('tampilan_admin', $data);
            $this->load->view('t_beranda', $data);
        } else {
            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
            // redirect("login");
        }
<<<<<<< HEAD
<<<<<<< HEAD
    }

    public function detail($id_permohonan){
        $cek = $this->session->userdata('logged_in');
        $status = $this->session->userdata('status');
        if (!empty($cek) && $status = "admin") {
            $data['judul']      = 'Data Pemohon';
            $data['act']        = 7;

            $data['topbar']         = $this->load->view('topbar', $data, true);
            $data['menu']           = $this->load->view('menu', $data, true);
            $data['rightsidebar']   = $this->load->view('rightsidebar', $data, true);
            $data['user_info']      = $this->load->view('user_info', $data, true);
            $data['logindropdown']  = $this->load->view('tampilan_menu/logindropdown', $data, true);

            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
            $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
            $this->form_validation->set_rules('tujuan_sekolah', 'Tujuan Sekolah', 'required');
            $this->form_validation->set_rules('mapel', 'Mapel', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');


            if ($this->form_validation->run() == TRUE) {
                $this->model_fasilitas->detail($id_permohonan, $this->input->post());
                redirect('admin/permohonan', 'refresh');
            }
            $data['dat'] = $this->model_fasilitas->getData($id_permohonan);
            $this->load->view('header', $data);
            $this->load->view('admin/detail', $data);
            $this->load->view('footer');
        }
    }
}
}
=======
	}
	
}
>>>>>>> parent of b4c0ba2... permohonan
=======
	}
	
}
>>>>>>> parent of b4c0ba2... permohonan
