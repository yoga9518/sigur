<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_permohonan extends CI_Model
{
  // Fungsi untuk menampilkan semua data user
  public function permohonan($id_permohonan, $input){
    $object = array(
      'nip'             => $input['nip'],
      'nama_guru'       => $input['nama_guru'],
      'asal_sekolah'    => $input['asal_sekolah'],
      'tujuan_sekolah'  => $input['tujuan_sekolah'],
      'mapel'           => $input['mapel'],
    );

    $this->db->where('id_permohonan', $id_permohonan);
    $this->db->update('tbl_permohonan', $object);
    $this->session->set_flashdata('pesan', '<div class="alert bg-yellow alert-dismissible" role="alert">
      Data Berhasil di Perbaharui !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span></button></div>');
  }
}

}

