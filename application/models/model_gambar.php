<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_gambar extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function view(){
    return $this->db->get('tbl_user')->result();
  }
  public function getall($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where('id',$id);
    return $this->db->get();
  }
  
  // Fungsi untuk melakukan proses upload file
  public function create(){

    $config['upload_path']    = './gambar/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_width']      = '1024';
    $config['max_height']     = '1024';
    
    // $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('gambar'))
    {
      $photo = ""; 
      $this->session->set_flashdata('message', $this->upload->display_errors());
    } else{
      // $photo = $this->upload->file_name;
      $photo = $this->upload->data('file_name');
      // $data = array('upload_data' => $this->upload->data());
      // var_dump($photo);
    }

    $object = array(
      'username'      => $this->input->post('username'),
      'nama_lengkap'  => $this->input->post('nama_lengkap'),
      // 'status'        => $this->input->post('alamat'),
      'email'         => $this->input->post('email'),
      'alamat'        => $this->input->post('alamat'),
      // 'foto'          => $photo,
      'nama_file'          => $photo,
    );

    $this->db->insert('tbl_user', $object);
    $this->session->set_flashdata('message', 'Berhasil Menambah Cabang Olahraga');


    // $config['upload_path']    = './gambar/';
    // $config['allowed_types']  = 'jpg|png|jpeg';
    // $config['max_size']       = '2048';
    // $config['remove_space']   = TRUE;
  
    // $this->load->library('upload', $config); // Load konfigurasi uploadnya
    // if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
    //   // Jika berhasil :
    //   $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
    //   return $return;
    // }else{
    //   // Jika gagal :
    //   $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
    //   return $return;
    // }
  }

  public function edit($id_user, $input)
  {
    $venue = $this->getall($id_user)->row();

    $config['upload_path']    = './gambar/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_width']      = '1024';
    $config['max_height']     = '1024';
    
    $this->upload->initialize($config);

      if (!$this->upload->do_upload('gambar'))
      {
        $photo = $venue->nama_file; 
        $this->session->set_flashdata('message', $this->upload->display_errors());
      } else{
        $photo = $this->upload->data('file_name');
        // $photo = $this->upload->file_name;
      }
      $object = array(
      'username'      => $input['username'],
      'nama_lengkap'  => $input['nama_lengkap'],
      'email'         => $input['email'],
      'alamat'        => $input['alamat'],
      'nama_file'     => $photo,
    );

    if ($this->input->post('gambar')) {
      // $photo = ""; 
      // $this->session->set_flashdata('message', $this->upload->display_errors());
      $object['nama_file'] = $photo;
    }
    $this->db->where('id', $id_user);
    $this->db->update('tbl_user', $object);
    $this->session->set_flashdata('message', 'Data Berhasil di Perbarui!');
  }
  // Fungsi untuk menyimpan data ke database
  public function save($upload){
    $data = array(
      'username'      =>$this->input->post('username'),
      'nama_lengkap'  =>$this->input->post('nama_lengkap'),
      'stts'          =>$this->input->post('stts'),
      'email'         =>$this->input->post('email'),
      'alamat'        =>$this->input->post('alamat'),
      'nama_file'     => $upload['file']['file_name'],
      'ukuran_file'   => $upload['file']['file_size'],
      'tipe_file'     => $upload['file']['file_type']
    );
    $this->db->insert('tbl_user', $data);
  }
  public function ambil_id_gambar($id)
  {
    $this->db->from('tbl_user');
    $this->db->where('id', $id);
    $result = $this->db->get('');
    // periksa ada datanya atau tidak
    if ($result->num_rows() > 0) {
      return $result->row();//ambil datanya berdasrka row id
    }
    
  }

  public function delete_user($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tbl_user');
    return TRUE;
  }
}