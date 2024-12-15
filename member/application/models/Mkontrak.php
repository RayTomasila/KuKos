<?php
  class Mkontrak extends CI_Model {

    function tampil() {
      $this->db->select('penyewa.*, kontrak.*, kamar.*');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));

      $this->db->order_by('kontrak.id_kontrak', 'desc'); 

      $query = $this->db->get();
      return $query->result_array();
    }
  
    function detail($id_kontrak) {
      $this->db->select('kontrak.*, penyewa.nama_penyewa, kamar.nomor_kamar, kamar.harga_kamar');
      $this->db->from('kontrak');
      $this->db->join('penyewa', 'penyewa.id_penyewa = kontrak.id_penyewa');
      $this->db->join('kamar', 'kamar.id_kamar = kontrak.id_kamar');
      $this->db->where('kontrak.id_kontrak', $id_kontrak);
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));

      $query = $this->db->get();
      return $query->row_array(); 
    }

    function tambah($inputan) {
      $inputan['id_member'] = $this->session->userdata("id_member");
      
      $this->db->insert('kontrak', $inputan);
  
      $this->db->set('status_kamar', 'digunakan');
      $this->db->where('id_kamar', $inputan['id_kamar']);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kamar');
    }
  

    function ubah($inputan, $id_kontrak) {
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));

      $kontrakLama = $this->db->get('kontrak')->row_array();

      if ($kontrakLama['id_kamar'] != $inputan['id_kamar']) {
          $this->db->set('status_kamar', 'siap huni');
          $this->db->where('id_kamar', $kontrakLama['id_kamar']);
          $this->db->where('id_member', $this->session->userdata("id_member"));
          $this->db->update('kamar');
      }

      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kontrak', $inputan);

      $this->db->set('status_kamar', 'digunakan');
      $this->db->where('id_kamar', $inputan['id_kamar']);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kamar');
    }
     

    function hapus($id_kontrak) {
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));
  
      $kontrak = $this->db->get('kontrak')->row_array();
  
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->delete('kontrak');
  
      $this->db->set('status_kamar', 'siap huni');
      $this->db->where('id_kamar', $kontrak['id_kamar']);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kamar');
   }
  

    public function getEnumValues($table, $column) {
      $query = $this->db->query("SHOW COLUMNS FROM $table WHERE Field = '$column'");
      $row = $query->row();
      preg_match("/^enum\((.*)\)$/", $row->Type, $matches);
      $enumValues = str_getcsv($matches[1], ',', "'");
      return $enumValues;
    }

  }
?>