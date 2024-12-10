<?php
  class Mkontrak extends CI_Model {
    
    private function queryTampilKontrakJoin($id_penyewa = null) {
      $this->db->select('penyewa.*, kontrak.*, kamar.*');
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

    function ubah($inputan, $id_kontrak) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->update('kontrak', $inputan);
    }

    function hapus($id_kontrak) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->delete('kontrak');
    }

    public function getKontrakById($id_kontrak) {
      $this->db->select('kontrak.*, penyewa.nama_penyewa, kamar.nomor_kamar, kamar.harga_kamar');
      $this->db->from('kontrak');
      $this->db->join('penyewa', 'penyewa.id_penyewa = kontrak.id_penyewa');
      $this->db->join('kamar', 'kamar.id_kamar = kontrak.id_kamar');
      $this->db->where('kontrak.id_kontrak', $id_kontrak);
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));
      $query = $this->db->get();
      return $query->row_array(); 
  }

    public function getEnumValues($table, $column) {
      $query = $this->db->query("SHOW COLUMNS FROM $table WHERE Field = '$column'");
      $row = $query->row();
      preg_match("/^enum\((.*)\)$/", $row->Type, $matches);
      $enumValues = str_getcsv($matches[1], ',', "'");
      return $enumValues;
    }

    public function getPenyewa() {
        $this->db->select('id_penyewa, nama_penyewa');
        $this->db->from('penyewa');
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $query = $this->db->get();
        return $query->result_array(); 
    }

    public function getKamar() {
        $this->db->select('id_kamar, nomor_kamar, harga_kamar');
        $this->db->from('kamar');
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $query = $this->db->get();
        return $query->result_array(); 
    }

  }