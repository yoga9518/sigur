<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_sekolah extends CI_Model {
// Fungsi untuk menampilkan semua data user
  public function view(){
    return $this->db->get('tbl_sekolah')->result();
  }
  public function create(){
  	$object = array(
      'npsn'          => $this->input->post('npsn'),
      'nama_sekolah'  => $this->input->post('namasekolah'),
      'alamat'        => $this->input->post('alamat'),
      'lat'           => $this->input->post('lat'),
      'long'          => $this->input->post('long'),
    );
    // echo var_dump($object);
    $this->db->insert('tbl_sekolah', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di Tambah !!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
  }
  public function edit($id_sekolah, $input){
    $object = array(
      'npsn'          => $input['npsn'],
      'nama_sekolah'  => $input['namasekolah'],
      'alamat'        => $input['alamat'],
      'lat'           => $input['lat'],
      'long'          => $input['long'],
      );
    $this->db->where('id_sekolah', $id_sekolah);
    $this->db->update('tbl_sekolah', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
  }
  public function delete($id_sekolah){
    $this->db->where('id_sekolah', $id_sekolah);
    $this->db->delete('tbl_sekolah');
    $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">Data Berhasil di Hapus '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');

  }
  public function getall($id_sekolah)
  {
    $this->db->select('*');
    $this->db->from('tbl_sekolah');
    $this->db->where('id_sekolah',$id_sekolah);
    return $this->db->get();
  }
  public function fasilitas(){
    $this->db->select('*');
    $this->db->from('tbl_sekolah');
    $this->db->join('tbl_fasilitas', 'tbl_sekolah.npsn = tbl_fasilitas.npsn');
    return $this->db->get();
  }

}