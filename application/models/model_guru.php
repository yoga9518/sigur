<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_guru extends CI_Model {
// Fungsi untuk menampilkan semua data user
  public function view(){
    return $this->db->get('tbl_guru')->result();
  }
  public function create(){
  	$object = array(
      'nip'             => $this->input->post('nip'),
      'nama'            => $this->input->post('nama'),
      'jk'              => $this->input->post('gender'),
      'tanggal_lahir'	  => $this->input->post('ttl'),
      'mapel'           => $this->input->post('mapel'),
      'pendidikan'		  => $this->input->post('pend'),
      'status_guru'     => $this->input->post('stguru'),
      // 'asal_sekolah'    => $this->input->post('sekolah'),
      'npsn'            => $this->input->post('npsn'), 

      // 'foto'          => $photo,
      // 'nama_file'     => $photo,
    );
    // echo var_dump($object);
    $this->db->insert('tbl_guru', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-green alert-dismissible" role="alert">Data Berhasil di Tambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
  }
  public function edit($id_guru, $input){
    $object = array(
      'nip'             => $input['nip'],
      'nama'            => $input['nama'],
      'jk'              => $input['gender'],
      'tanggal_lahir'   => $input['ttl'],
      'mapel'           => $input['mapel'],
      'pendidikan'      => $input['pend'],
      'status_guru'     => $input['stguru'],
      // 'asal_sekolah'    => $input['sekolah'],
      'npsn'            => $input['npsn'],
      );
    $this->db->where('id_guru', $id_guru);
    $this->db->update('tbl_guru', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
  }
  public function delete($id_guru){
    $this->db->where('id_guru', $id_guru);
    $this->db->delete('tbl_guru');
    $this->session->set_flashdata('pesan', '<div class="alert bg-red alert-dismissible" role="alert">Data Berhasil di Hapus '
                 . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                 . '<span aria-hidden="true">×</span></button></div>');
  }
  public function getall($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_guru');
    // $this->db->join('tbl_sekolah', 'tbl_sekolah.npsn = tbl_guru.npsn');
    $this->db->where('id_guru',$id);
    return $this->db->get();
  }
  function stguru() {
  	return $this->db->get('tbl_status_guru')->result_array();
  }
  function mapel(){
  	return $this->db->get('tbl_mapel')->result_array();
  }
  function pend(){
  	return $this->db->get('tbl_pendidikan')->result_array();
  }
  function sekolah(){
  	return $this->db->get('tbl_sekolah')->result_array();
  	// $this->db->order_by('tbl_sekolah', 'DESC');
  }
  function fasilitas(){
    return $this->db->get('tbl_fasilitas')->result_array();
  }
  public function semua(){
    $this->db->select('*');
    $this->db->from('tbl_sekolah');
    $this->db->join('tbl_guru', 'tbl_sekolah.npsn = tbl_guru.npsn');
    return $this->db->get();
  }
  public function permohonan($id_permohonan, $input){
    $object = array(
      'nip'             => $input['nip'],
      'nama'            => $input['nama'],
      'jk'              => $input['gender'],
      'tanggal_lahir'   => $input['ttl'],
      'mapel'           => $input['mapel'],
      'pendidikan'      => $input['pend'],
      'status_guru'     => $input['stguru'],
      // 'asal_sekolah'    => $input['sekolah'],
      'npsn'            => $input['npsn'],
      );
    $this->db->where('tbl_permohonan', $id_permohonan);
    $this->db->update('tbl_permohonan', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
  }

}