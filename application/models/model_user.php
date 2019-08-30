<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user extends CI_Model {
    public function cek_user($data) {
        $query = $this->db->get_where('tbl_user', $data);
        return $query;
    }
    public function getdata($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update($data,$where){
        return $this->db->update('tbl_user',$data,$where);
    }
    public function get_by_id($id){
        return $this->db->get_where('tbl_user',array('id' =>$id ))->row();
    }
    public function dieditsekolah($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapussekolah($tabelName, $where) {
        $res = $this->db->delete($tabelName, $where);
        return $res;
    }
    function user() {
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }
    function sekolah() {
        $query = $this->db->get('tbl_sekolah_tampan');
        return $query->result_array();
    }
    function tabel() {
        $query = $this->db->get('tabel');
        return $query->result_array();
    }
    function peta() {
        return $this->db->get('tbl_sekolah');
    }
    function tambah($data) {
        $this->db->insert('tbl_sekolah_tampan', $data);
        return TRUE;
    }
    function ubah($data, $id){
    	$this->db->where('id',$id);
    	$this->db->update('tbl_sekolah_tampan', $data);
    	return TRUE;
    }
}