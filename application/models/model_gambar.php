<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_gambar extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function view(){
    return $this->db->get('tbl_user')->result();
  }
  
  // Fungsi untuk melakukan proses upload file
  public function create(){

    $config['upload_path']    = './gambar/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_width']      = '1024';
    $config['max_height']     = '768';
    
    $this->load->library('upload', $config);
    // $this->upload->initialize($config);

    if (!$this->upload->do_upload('input_gambar'))
    {
      $photo = ""; 
      $this->session->set_flashdata('message', $this->upload->display_errors());
    } else{
      $photo = $this->upload->file_name;
      $data = array('upload_data' => $this->upload->data());
      // var_dump($photo);
    }

    $object = array(
      'username'      => $this->input->post('username'),
      'nama_lengkap'  => $this->input->post('nama_lengkap'),
      // 'status'        => $this->input->post('alamat'),
      'email'         => $this->input->post('email'),
      'alamat'        => $this->input->post('alamat'),
      'foto'          => $photo,
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