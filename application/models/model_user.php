<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_user extends CI_Model {
// Fungsi untuk menampilkan semua data user
  public function cek_user($data) {
    $query = $this->db->get_where('tbl_user', $data);
    return $query;
    }
  public function view(){
    return $this->db->get('tbl_user')->result();
  }
  public function getall($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_user ');
    $this->db->where('id',$id);
    return $this->db->get();
  }
  public function create(){

    $config['upload_path']    = './gambar/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_width']      = '2024';
    $config['max_height']     = '2024';
    
    // $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('gambar'))
    {
      $photo = "a.jpg";
      // $object['nama_file'] = $this->input->post()
      $this->session->set_flashdata('pesan', $this->upload->display_errors());
    } else{
      // $photo = $this->upload->file_name;
      $photo = $this->upload->data('file_name');
      // $data = array('upload_data' => $this->upload->data());
      // var_dump($photo);
    }
    $object = array(
      'username'      => $this->input->post('username'),
      'nama_lengkap'  => $this->input->post('nama_lengkap'),
      'status'        => $this->input->post('status'),
      'email'         => $this->input->post('email'),
      'alamat'        => $this->input->post('alamat'),
      'password'      => md5($this->input->post('username')),
      // 'foto'          => $photo,
      'nama_file'     => $photo,
    );

    $this->db->insert('tbl_user', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di Tambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
  }



  public function edit($id_user, $input)
  {
    
    $_gambar = $this->getall($id_user)->row();

    $config['upload_path']    = './gambar/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']             = '1024';
    $config['max_width']      = '1024';
    $config['max_height']     = '1024';
    
    $this->upload->initialize($config);

      if (!$this->upload->do_upload('gambar'))
      {
        $photo = $_gambar->nama_file; 
        $this->session->set_flashdata('pesan', $this->upload->display_errors());
      } else{
        $photo = $this->upload->data('file_name');
        // $photo = $this->upload->file_name;
      }
       
      $object = array(
      'username'      => $input['username'],
      'nama_lengkap'  => $input['nama_lengkap'],
      'email'         => $input['email'],
      'status'        => $input['status'],
      'alamat'        => $input['alamat'],
      'nama_file'     => $photo,
    );
         $query = $this->db->update('tbl_user', $object, array('id' => $id_user));;
    
    if($query){
        unlink("gambar/".$_gambar->nama_file);
    }
    
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
      
    }

  public function ambil_id_gambar($id_user)
  {
    $this->db->from('tbl_user');
    $this->db->where('id', $id_user);
    $result = $this->db->get('');
    // periksa ada datanya atau tidak
    if ($result->num_rows() > 0) {
      return $result->row();//ambil datanya berdasrka row id
    }
  }
  public function delete_user($id_user)
  {
    $this->db->where('id', $id_user);
    $this->db->delete('tbl_user');
    return TRUE;
  }
  function tabel() {
    $query = $this->db->get('tbl_user');
    return $query->result_array();
  }
  public function map(){
    $where = "mapel='PJOK' AND status='boss' OR status='active'";
    $this->db->where($where);
  }
  public function peta()
  {
    $query = $this->db->query("SELECT tbl_guru.mapel,tbl_sekolah.lat,tbl_sekolah.long, tbl_sekolah.npsn,tbl_sekolah.nama_sekolah,tbl_sekolah.alamat,tbl_guru.nama,tbl_guru.Sertifikasi,tbl_guru.status_guru, tbl_fasilitas.r_kelas,tbl_fasilitas.r_lab,tbl_fasilitas.r_perpus from tbl_sekolah JOIN tbl_guru on tbl_sekolah.npsn = tbl_guru.npsn join tbl_fasilitas ON tbl_sekolah.npsn = tbl_fasilitas.npsn");
    return $query;
  }
  function status() {
        $sql   = "SELECT * FROM tbl_status";
        
        $query = $this->db->query($sql);
        $data=$query->result_array();
        return $data;
    }
    function sch(){
    return $this->db->get('tbl_sekolah')->result_array();
  }
  public function maps()
  {
    $query = $this->db->query("SELECT tbl_guru.mapel,tbl_sekolah.lat,tbl_sekolah.long, tbl_sekolah.npsn,tbl_sekolah.nama_sekolah,tbl_sekolah.alamat,tbl_guru.nama,tbl_guru.Sertifikasi,tbl_guru.status_guru, tbl_fasilitas.r_kelas,tbl_fasilitas.r_lab,tbl_fasilitas.r_perpus from tbl_sekolah JOIN tbl_guru on tbl_sekolah.npsn = tbl_guru.npsn join tbl_fasilitas ON tbl_sekolah.npsn = tbl_fasilitas.npsn");
    return $query;
  }
}