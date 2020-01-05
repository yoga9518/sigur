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
        $this->load->library('leaflet');
		$data['judul'] 		= 'Peta Sebaran Guru';
		$data['act'] = 3;

		// $data['data'] = $this->model_user->tabel();
        $dat = array(
            'marker' => $this->model_user->peta()->result(),
            );

        $config = array(
            'center'        => '0.5129, 101.4567',
            'zoom'          => '11',
            );


        $this->leaflet->initialize($config);
        foreach ($dat['marker'] as $row) {        
        // $marker = array();
            // var_dump($row->mapel = "PJOK");
        $marker['latlng']           = "{$row->lat}, {$row->long}";
        // // $marker['latlng']           = "0.46283400, 101.40274200";
        // $marker['iconUrl'] = base_url('assets/images/marker-icon.png');
        
        $marker['iconSize']         = "[20, 30]";
            $marker['popupContent']     = "<div class='body'>"
                            ."<ul class='nav nav-tabs tab-nav-right' role='tablist'>"
                                ."<li role='presentation' class='active'><a href='#home' data-toggle='tab' aria-expanded='true'>Sekolah</a></li>"
                                ."<li role='presentation' class=''><a href='#profile' data-toggle='tab' aria-expanded='false'>Guru</a></li>"
                                ."<li role='presentation' class=''><a href='#messages' data-toggle='tab' aria-expanded='false'>Fasilitas</a></li>"
                            ."</ul>"
                            ."<div class='tab-content'>"
                                ."<div role='tabpanel' class='tab-pane fade active in' id='home'>"
                                    ."<b>NPSN : $row->npsn</b><br>"
                                    ."<b>$row->nama_sekolah</b>"
                                    ."<p>$row->alamat <br>"
                                    ."$row->nama"
                                    ."</p>"
                                ."</div>"
                                ."<div role='tabpanel' class='tab-pane fade ' id='profile'>"
                                    ."<b> Mapel $row->mapel</b>"
                                    ."<p> Nama Guru : $row->nama <br>"
                                    ."Setifikasi : $row->Sertifikasi<br>"
                                    ."Status : $row->status_guru</p>"
                                ."</div>"
                                ."<div role='tabpanel' class='tab-pane fade' id='messages'>"
                                    ."<b>Fasilitas</b>"
                                    ."<p>Ruangan Labor : <br>"
                                    ." Ruangan Kelas : <br>"
                                    ." Ruangan Perpus : </p>"
                                ."</div>"                         
                            ."</div>"
                        ."</div>";

/*
        if ($row->mapel == "MUATAN LOKAL" && "PJOK" && "PENDIDIKAN AGAMA ISLAM") {
 
            
            // $marker['latlng']           = "{$row->lat}, {$row->long}";
            $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
            // $marker['iconSize']         = "[20, 30]";
  }else{
            // $marker['latlng']           = "{$row->lat}, {$row->long}";
           
            // $marker['iconSize']         = "[20, 30]";
            
            $marker['iconUrl'] = base_url('assets/images/marker-red-2x.png');
        }*/
        if ($row->mapel == "MUATAN LOKAL") {
            
            // $marker['latlng']           = "{$row->lat}, {$row->long}";
            $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
            // $marker['iconSize']         = "[20, 30]";
  }elseif ($row->mapel == "PJOK") {
     $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
  }
  elseif ($row->mapel== "PENDIDIKAN AGAMA ISLAM") {
     $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
  }

  else{
            // $marker['latlng']           = "{$row->lat}, {$row->long}";
           
            // $marker['iconSize']         = "[20, 30]";
            
            $marker['iconUrl'] = base_url('assets/images/marker-red-2x.png');
        }

        $this->leaflet->add_marker($marker);
        }
        $data['map']  = $this->leaflet->create_map();

		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('admin/peta_v',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}
}