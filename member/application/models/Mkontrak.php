<?php
  class Mkontrak extends CI_Model {

    private function queryTampilKontrakJoin($id_penyewa = null) {
      $this->db->select('penyewa.nama_penyewa, kontrak.*, kamar.nomor_kamar, kamar.id_kamar');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));
  
      if ($id_penyewa !== null) {
        $this->db->where('penyewa.id_penyewa', $id_penyewa);
      }
  
    $query = $this->db->get();
      return $query->result_array();
    }

    function tampil() {
      return $this->queryTampilKontrakJoin(null);
    }
    
    function detail($id_penyewa) {
      return $this->queryTampilKontrakJoin($id_penyewa);

    }
  }