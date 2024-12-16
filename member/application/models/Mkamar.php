<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Mkamar extends CI_Model {    
    public function get_kamar($id_kamar) {
      $this->db->where('id_kamar', $id_kamar);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->get('kamar')->row_array();
    }  

    public function tampil() {
      $this->db->select('fasilitas.nama_fasilitas, kamar.*, kontrak.id_kontrak, penyewa.nama_penyewa');
      $this->db->from('kamar');
      $this->db->join('fasilitas', 'fasilitas.id_fasilitas = kamar.id_fasilitas', 'left');
      $this->db->join('kontrak', 'kamar.id_kamar = kontrak.id_kamar', 'inner');
      $this->db->join('penyewa', 'kontrak.id_penyewa = penyewa.id_penyewa', 'left');
      $this->db->where('kamar.id_member', $this->session->userdata('id_member')); 
      $query = $this->db->get();
      
      return $query->result_array();
      
    }

    public function detail($id_kamar) {
      return $this->db->get_where('kamar', ['id_kamar' => $id_kamar])->row();
    }

    public function tambah($data) {
      return $this->db->insert('kamar', $data);
    }


    public function update_kamar($id_kamar, $data) {
        $this->db->where('id_kamar', $id_kamar);
        return $this->db->update('kamar', $data);
    }
    public function get_fasilitas_by_member($id_member) {
      $this->db->where('id_member', $id_member);
      return $this->db->get('fasilitas')->result_array();
    }

    public function ubah($id_kamar, $data) {
      $this->db->where('id_kamar', $id_kamar);
      return $this->db->update('kamar', $data);
    } 
  }
?>
