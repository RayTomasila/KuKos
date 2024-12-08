<?php
  class Mkontrak extends CI_Model {

    private function queryTampilKontrakJoin($id_penyewa = null) {
      $this->db->select('penyewa.nama_penyewa, kontrak.id_kontrak, kontrak.*, kamar.nomor_kamar, kamar.id_kamar');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));

      $this->db->order_by('kontrak.id_kontrak', 'desc'); 

  
      if ($id_penyewa !== null) {
        $this->db->where('penyewa.id_penyewa', $id_penyewa);
      }
  
      $query = $this->db->get();
      return $query->result_array();
    }

    function tampil() {
      $result = $this->queryTampilKontrakJoin(null);
      $this->db->order_by('kontrak.id_kontrak', 'desc'); 
      return $result;
  }
  
    function detail($id_penyewa) {
      $result = $this->queryTampilKontrakJoin($id_penyewa);
      $this->db->order_by('kontrak.id_kontrak', 'desc');  
      return $result;
    }

    function tambah($inputan) {
      $inputan['id_member'] = $this->session->userdata("id_member");
      $this->db->insert('kontrak', $inputan);
    }

    function hapus($id_kontrak) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->delete('kontrak');
    }

  }