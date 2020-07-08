<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_fasilitas extends CI_Model
{
  // Fungsi untuk menampilkan semua data user
  public function view()
  {
    $this->db->select('*');
    $this->db->from('tbl_sekolah');
    $this->db->join('tbl_fasilitas', 'tbl_sekolah.npsn = tbl_fasilitas.npsn');
    return $this->db->get();
  }
  public function getall($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_sekolah');
    $this->db->join('tbl_fasilitas', 'tbl_sekolah.npsn = tbl_fasilitas.npsn');

    $this->db->where('id_sekolah', $id);
    return $this->db->get();
  }
  // public function fasilitas(){
  //   $this->db->select('*');
  //   $this->db->from('tbl_sekolah');
  //   $this->db->join('tbl_fasilitas', 'tbl_sekolah.npsn = tbl_fasilitas.npsn');
  //   return $this->db->get();
  // }
  public function edit($id_fasilitas, $input)
  {
    $object = array(
      'r_kelas'              => $input['r_kelas'],
      'r_lab'   => $input['r_lab'],
      'r_perpus'           => $input['r_perpus'],

    );
    $this->db->where('id_fasilitas', $id_fasilitas);
    $this->db->update('tbl_fasilitas', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
  }
  public function permohonan()
  {
    return $this->db->get('tbl_permohonan')->result();
  }
  public function detail($id_permohonan, $input)
  {
    $object = array(
      'nip'             => $input['nip'],
      'nama_guru'       => $input['nama_guru'],
      'asal_sekolah'    => $input['asal_sekolah'],
      'tujuan_sekolah'  => $input['tujuan_sekolah'],
      'mapel'           => $input['mapel'],
      'status'          => $input['status'],

    );
    $this->db->where('id_permohonan', $id_permohonan);
    $this->db->update('tbl_permohonan', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
  }

  public function getData($id_permohonan)
  {
    return $this->db->get_where('tbl_permohonan', ['id_permohonan' => $id_permohonan])->row();
    // $this->db->where('id_pemohon', $id_permohonan);
    // return $this->db->get('tbl_permohonan');
  }
}
