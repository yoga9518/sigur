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
		$data['judul'] 		= 'Peta Sebaran Guru';
		$data['act'] = 3;
        $data['marker'] = $this->model_user->peta()->result();
//         foreach ($dat['marker'] as $row) {        
//         // $marker = array();
            // var_dump($data['marker']);
//         $marker['latlng']           = "{$row->lat}, {$row->long}";
//         // // $marker['latlng']           = "0.46283400, 101.40274200";
//         // $marker['iconUrl'] = base_url('assets/images/marker-icon.png');
        
//         $marker['iconSize']         = "[20, 30]";
//             $marker['popupContent']     = "<div class='body'>"
//                             ."<ul class='nav nav-tabs tab-nav-right' role='tablist'>"
//                                 ."<li role='presentation' class='active'><a href='#home' data-toggle='tab' aria-expanded='true'>Sekolah</a></li>"
//                                 ."<li role='presentation' class=''><a href='#profile' data-toggle='tab' aria-expanded='false'>Guru</a></li>"
//                                 ."<li role='presentation' class=''><a href='#messages' data-toggle='tab' aria-expanded='false'>Fasilitas</a></li>"
//                             ."</ul>"
//                             ."<div class='tab-content'>"
//                                 ."<div role='tabpanel' class='tab-pane fade active in' id='home'>"
//                                     ."<b>NPSN : $row->npsn</b><br>"
//                                     ."<b>$row->nama_sekolah</b>"
//                                     ."<p>$row->alamat <br>"
//                                     ."$row->nama"
//                                     ."</p>"
//                                 ."</div>"
//                                 ."<div role='tabpanel' class='tab-pane fade ' id='profile'>"
//                                     ."<b> Mapel $row->mapel</b>"
//                                     ."<p> Nama Guru : $row->nama <br>"
//                                     ."Setifikasi : $row->Sertifikasi<br>"
//                                     ."Status : $row->status_guru</p>"
//                                 ."</div>"
//                                 ."<div role='tabpanel' class='tab-pane fade' id='messages'>"
//                                     ."<b>Fasilitas</b>"
//                                     ."<p>Ruangan Labor : <br>"
//                                     ." Ruangan Kelas : <br>"
//                                     ." Ruangan Perpus : </p>"
//                                 ."</div>"                         
//                             ."</div>"
//                         ."</div>";

//         if ($row->mapel == "MUATAN LOKAL") {
//             $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
//   }elseif ($row->mapel == "PJOK") {
//      $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
//   }elseif ($row->mapel== "PENDIDIKAN AGAMA ISLAM") {
//      $marker['iconUrl'] = base_url('assets/images/marker-icon.png'); 
//   }
//   else{
//             // $marker['latlng']           = "{$row->lat}, {$row->long}";
           
//             // $marker['iconSize']         = "[20, 30]";
            
//             $marker['iconUrl'] = base_url('assets/images/marker-red-2x.png');
//         }

        
		$this->load->view('template/header',$data);
		$this->load->view('admin/peta_v',$data);
		$this->load->view('template/footer');
    }
}