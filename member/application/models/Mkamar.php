<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Mkamar extends CI_Model {    
    public function get_kamar($id_kamar) {
      $this->db->where('id_kamar', $id_kamar);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->get('kamar')->row_array();
    }  

    public function tampil() {
      $this->db->select('kamar.*, fasilitas.nama_fasilitas');
      $this->db->from('kamar');
      $this->db->join('fasilitas', 'kamar.id_fasilitas = fasilitas.id_fasilitas', 'left');
      $this->db->where('kamar.id_member', $this->session->userdata('id_member'));
      $q = $this->db->get();

      return $q->result_array();
    }

    public function detail($id_kamar) {
      return $this->db->get_where('kamar', ['id_kamar' => $id_kamar])->row();
    }

    public function tambah($data) {
      return $this->db->insert('kamar', $data);
    }

    public function ubah($id_kamar, $data) {
      $this->db->where('id_kamar', $id_kamar);
      return $this->db->update('kamar', $data);
    } 

  }
?>
