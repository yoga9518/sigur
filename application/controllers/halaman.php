<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('text');
        $this->load->helper('form','url');
        $this->load->model('model_user');
        $this->load->model('model_gambar');
        $this->load->model(array('model_user'));
    }
	public function index()

	{
		$data['judul'] 		= 'SIGUR - Sistem Informasi Guru';
		$data['act'] = 1;

		$dat = array(
                'data' => $this->model_user->tabel()
            );

		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('halaman/beranda',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}
    public function tulis()

    {
        $data['judul']      = 'Tulis Artikel';
        $data['act'] = 5;

        $dat = array(
                'data' => $this->model_user->tabel()
            );

        $data['topbar']     = $this->load->view('topbar', $data, true);
        $data['menu']       = $this->load->view('menu', $data, true);
        $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
        $data['user_info']  = $this->load->view('user_info',$data, true);
        $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
        $data['halaman']    = $this->load->view('halaman/tulis',$dat, true);
        // $this->load->view('tampilan_admin', $data);
        $this->load->view('t_beranda', $data);
    }
	public function data_sekolah()
	{
		$data['judul'] 		= 'Data Sekolah';
		$data['act'] = 2;

		$dat = array(
                'data' => $this->model_user->sekolah()
            );  

		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('halaman/data_sekolah',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}
	public function edit_sekolah($id)
	{
		$data['judul'] 		= 'Edit Data Sekolah';
		$data['act'] = 2;

		$dat = array(
                'data' => $this->model_user->user()
            );
		$where = array('id' => $id);

		$data['hasil'] = $this->model_user->Getdata($where,'tbl_sekolah_tampan')->result();


		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('halaman/edit_sekolah',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);	
	}
	public function dieditsekolah()
	{
		$id     = $this->input->post('id');
            // $idpel  = $this->input->post('idpel');
        $nama_s   	= $this->input->post('namasekolah');
        $pd     	= $this->input->post('pd');
        $r_kelas  	= $this->input->post('rkelas');
        $rombel 	= $this->input->post('rombel');
        $guru 		= $this->input->post('guru');
        $pegawai 	= $this->input->post('pegawai');
        $data   	= array(
        // 'idpel'     => $idpel,
        	'nama_sekolah'  => $nama_s,
            'pd'    		=> $pd,
            'r_kelas'  		=> $r_kelas,
            'rombel'    	=> $rombel,
            'guru'			=> $guru,
            'pegawai'		=> $pegawai
            //'kategori'  => $this->input->post('kategori')
        );
        $where = array(
            'id' => $id
        );
         // echo var_dump($data);
        $res = $this->model_user->dieditsekolah($where, $data, 'tbl_sekolah_tampan');

        $res = $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di ubah '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');
        redirect('halaman/data_sekolah');
         
	}
	public function tambahsekolah() 
	{
		$data = array(
                'npsn'      	=> $this->input->post('npsn'),
                'nama_sekolah'  => $this->input->post('namasekolah'),
                'pd'          	=> $this->input->post('pd'),
                'r_kelas'      	=> $this->input->post('rkelas'),
                'rombel'		=> $this->input->post('rombel'),
                'guru'			=> $this->input->post('guru'),
                'pegawai'		=> $this->input->post('pegawai')
            );
		// echo var_dump($data);
		$this->model_user->tambah($data);
		$res = $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di tambah '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');

        redirect('halaman/data_sekolah');

	}

	public function tambah()
    {
        $this->load->library('form_validation');
        $data['judul']      = 'Edit Data User';
        $data['act'] = 4;
        // $this->load->view('halaman/user', $data);

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
        // $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('alamat','Alamat','required');

        if ($this->form_validation->run() == TRUE)
        {
            // $this->load->view('myform');
            $this->model_gambar->create();
            redirect('halaman/user', 'refresh');
        }
        // $data['content'] = 'halaman/user';
        $this->load->view('halaman/user', $data);
    


  //       $data = array();
  //       if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
		// // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
  //     	$upload = $this->model_gambar->upload();
      
  //     	if($upload['result'] == "success"){ // Jika proses upload sukses
  //        // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
  //       	$this->model_gambar->save($upload);
        
  //       	redirect('halaman/user'); // Redirect kembali ke halaman awal / halaman view data
  //     	}else{ // Jika proses upload gagal
  //       	$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
  //     	}	
  //     }
  //     $this->load->view('halaman/user', $data);
  }




	public function peta()

	{
        $this->load->library('leaflet');
		$data['judul'] 		= 'Peta Sebaran Guru';
		$data['act'] = 3;

		$data['data'] = $this->model_user->tabel();
        $data['marker'] = $this->model_user->peta()->result();

        $config = array(
            'center'        => '0.5129, 101.4567',
            'zoom'          => '11',
            );

        $this->leaflet->initialize($config);
        foreach ($data['marker'] as $row) {
            
        
        $marker = array();
        $marker['latlng']           = "{$row->lat}, {$row->long}";
        // $marker['latlng']           = "0.46283400, 101.40274200";
        $marker['popupContent']     = "<div class='body'>"
                            
                            ."<ul class='nav nav-tabs tab-nav-right' role='tablist'>"
                                ."<li role='presentation' class='active'><a href='#home' data-toggle='tab' aria-expanded='true'>Sekolah</a></li>"
                                ."<li role='presentation' class=''><a href='#profile' data-toggle='tab' aria-expanded='false'>Guru</a></li>"
                                ."<li role='presentation' class=''><a href='#messages' data-toggle='tab' aria-expanded='false'>Fasilitas</a></li>"
                            ."</ul>"
                            ."<div class='tab-content'>"
                                ."<div role='tabpanel' class='tab-pane fade active in' id='home'>"
                                    ."<b>$row->nama_sekolah</b>"
                                    ."<p>$row->alamat</p>"
                                ."</div>"
                                ."<div role='tabpanel' class='tab-pane fade ' id='profile'>"
                                    ."<b>$row->nama_sekolah</b>"
                                    ."<p>$row->alamat</p>"
                                ."</div>"
                                ."<div role='tabpanel' class='tab-pane fade' id='messages'>"
                                    ."<b>Message Content</b>"
                                    ."<p>"
                                        ."Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius."
                                        ."Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid"
                                        ."pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren"
                                        ."sadipscing mel"
                                    ."</p>"
                                ."</div>"                         
                            ."</div>"
                        ."</div>";



        $marker['iconUrl'] = base_url('assets/images/marker-red-2x.png');
        $marker['iconSize']         = "[15, 25]";

        // if ($row->rombel < 22) {
        //     $marker['iconUrl'] = base_url('assets/images/marker-red-2x.png');
        //     $marker['iconSize']         = "[25, 41]";
        // }else{
        //     $marker['iconUrl'] = base_url('assets/images/marker-icon.png');
        //     $marker['iconSize']         = "[25, 41]";
        // }

        $this->leaflet->add_marker($marker);
        }
        $data['map']  = $this->leaflet->create_map();

		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('halaman/peta',$data, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}

	public function user()
	{
		$data['judul'] 		= 'Data User';
		$data['act'] = 4;

		$dat = array(
                'data' => $this->model_user->user()
            );
		$dat['gambar'] = $this->model_gambar->view();

		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('halaman/user',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);
	}

	public function hapussekolah($id) 
	{
		$where = array('id' => $id);
		echo var_dump($where);


        $res = $this->model_user->hapussekolah('tbl_sekolah_tampan', $where);
        if ($res >= 1) {
            $res = $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di Hapus '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');
            redirect('halaman/data_sekolah');
        } else {

            echo "<script>alert('Maaf anda tidak berhak mengakses halaman ini');history.go(-1);</script>";
        }
    }
    public function tambah_user(){
        $data['judul']      = 'Edit Data User';
        $data['act'] = 4;

        $dat = array(
                'data' => $this->model_user->user()
            );

        $data['topbar']     = $this->load->view('topbar', $data, true);
        $data['menu']       = $this->load->view('menu', $data, true);
        $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
        $data['user_info']  = $this->load->view('user_info',$data, true);
        $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
        $data['halaman']    = $this->load->view('halaman/tambah_user',$dat, true);
        // $this->load->view('tampilan_admin', $data);
        $this->load->view('t_beranda', $data);  
    

    }
    public function edit_user($id){
    	$data['judul'] 		= 'Edit Data User';
		$data['act'] = 4;

		$dat = array(
                'data' => $this->model_user->user()
            );
		$where = array('id' => $id);

		$data['hasil'] = $this->model_user->Getdata($where,'tbl_user')->result();


		$data['topbar'] 	= $this->load->view('topbar', $data, true);
		$data['menu']		= $this->load->view('menu', $data, true);
		$data['rightsidebar']		= $this->load->view('rightsidebar', $data, true);
		$data['user_info']	= $this->load->view('user_info',$data, true);
		$data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
		
		$data['halaman']	= $this->load->view('halaman/edit_user',$dat, true);
		// $this->load->view('tampilan_admin', $data);
		$this->load->view('t_beranda', $data);	
	

    }
    public function updateuser(){
    	$id = $this->uri->segment(3);

    	$config['upload_path']          = './gambar/';
	    $config['allowed_types']        = 'gif|jpg|png';
    	$config['max_size']             = 0;
	    $config['max_width']            = 0;
    	$config['max_height']           = 0;
	    $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('halaman/user', $error);
    	}else{
        $_data = array('upload_data' => $this->upload->data());
        $data = array(
            'username'=> $this->input->post('username'),
            'foto' => $_data['upload_data']['file_name']
            );
        $query = $this->db->insert('upload',$data);
        if($query){
            echo 'berhasil di upload';
            redirect('halaman/user');
        }else{
            echo 'gagal upload';
        }
    }


    	// $id = $this->uri->segment(3);
 
     //        $config['upload_path']         = './gambar/';  // foler upload 
     //        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
     //        $config['max_size']             = 2480;
     //        $config['max_width']            = 1024;
     //        $config['max_height']           = 768;
 
     //        $this->load->library('upload', $config);
 
     //        if ( ! $this->upload->do_upload('gambar')) //sesuai dengan name pada form 
     //        {
     //            echo 'anda belum upload';
     //        }
     //        else
     //        {
     //               //tampung data dari form
     //            $username 		= $this->input->post('username');
     //            $nama_lengkap	= $this->input->post('nama_lengkap');
     //            $stts			= $this->input->post('stts');
     //            $email			= $this->input->post('email');
     //            $alamat 		= $this->input->post('alamat');
     //            $file_name 		= $this->upload->data();
     //            $foto	 		= $file['file_name'];
 
     //            $this->model_user->update(array(
     //                'username'		=> $username,
     //                'nama_lengkap' 	=> $nama_lengkap,
     //                'stts'			=> $stts,
     //                'email'			=> $email,
     //                'alamat'		=> $alamat,
     //                'foto'			=> $gambar
     //                ), array('id' => $this->input->post('id')
     //                    )
     //            );
     //            $this->session->set_flashdata('msg','data berhasil di update');
     //            redirect('product');
     //        }
            
     //        $data['tampil']=$this->model_user->get_by_id($id); 
     //        $this->load->view('edit_user',$data);
          
    }
    public function data_guru()
    {
        $data['judul']      = 'Data Guru';
        $data['act'] = 5;

        $dat = array(
                'data' => $this->model_user->tabel()
            );

        $data['topbar']     = $this->load->view('topbar', $data, true);
        $data['menu']       = $this->load->view('menu', $data, true);
        $data['rightsidebar']       = $this->load->view('rightsidebar', $data, true);
        $data['user_info']  = $this->load->view('user_info',$data, true);
        $data['logindropdown'] = $this->load->view('tampilan_menu/logindropdown', $data, true);
        
        $data['halaman']    = $this->load->view('halaman/guru',$dat, true);
        // $this->load->view('tampilan_admin', $data);
        $this->load->view('t_beranda', $data); 
    }
    public function delete_user($id)
	{
		$data = $this->model_gambar->ambil_id_gambar($id);
	  	// lokasi gambar berada
  		$path = './gambar/';
  		@unlink($path.$data->nama_file);// hapus data di folder dimana data tersimpan
  		if ($this->model_gambar->delete_user($id) == TRUE) {
  		// TAMPILKAN PESAN JIKA BERHASIL
  			$res = $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di Hapus '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');
  		}
  		redirect('halaman/user');
  	}

	function ubah(){
		$id = $this->input->post('id');
		$data = array(
			'namasekolah'		=> $this->input->post('namasekolah'),
        	'guru'	=> $this->input->post('guru'),
        	'pd'	=> $this->input->post('pd')
        	);
		echo var_dump($data);
	// 	$this->model_admin->ubah($data,$id);
	// 	$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	// 	redirect('admin');
	 }
}
