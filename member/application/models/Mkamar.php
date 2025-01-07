<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Mkamar extends CI_Model {    

    public function tampil() {
      $this->db->select('kamar.*, kontrak.id_kontrak, penyewa.nama_penyewa, GROUP_CONCAT(fasilitas.nama_fasilitas SEPARATOR ", ") as fasilitas_list');
      $this->db->from('kamar');
      $this->db->join('kamar_fasilitas', 'kamar_fasilitas.id_kamar = kamar.id_kamar', 'left');
      $this->db->join('fasilitas', 'fasilitas.id_fasilitas = kamar_fasilitas.id_fasilitas', 'left');
      $this->db->join('kontrak', 'kamar.id_kamar = kontrak.id_kamar', 'left');
      $this->db->join('penyewa', 'kontrak.id_penyewa = penyewa.id_penyewa', 'left');
      $this->db->where('kamar.id_member', $this->session->userdata('id_member')); 
      $this->db->group_by('kamar.id_kamar');
      $this->db->order_by('kamar.id_kamar', 'asc');
      $query = $this->db->get();
      
      return $query->result_array();
    }
  

    public function detail($id_kamar) {
      $this->db->select('kamar.*, GROUP_CONCAT(fasilitas.id_fasilitas) as fasilitas_ids');
      $this->db->from('kamar');
      $this->db->join('kamar_fasilitas', 'kamar.id_kamar = kamar_fasilitas.id_kamar', 'left');
      $this->db->join('fasilitas', 'kamar_fasilitas.id_fasilitas = fasilitas.id_fasilitas', 'left');
      $this->db->where('kamar.id_kamar', $id_kamar);
      $this->db->group_by('kamar.id_kamar');
      return $this->db->get()->row();
    }
  

    public function tambah_kamar($data, $fasilitas) {
      $this->db->insert('kamar', $data);
      $id_kamar = $this->db->insert_id();
  
      foreach ($fasilitas as $id_fasilitas) {
          $this->db->insert('kamar_fasilitas', [
              'id_kamar' => $id_kamar,
              'id_fasilitas' => $id_fasilitas
          ]);
      }
      return true;
    }  

    public function ubah($id_kamar, $data, $fasilitas) {
      $this->db->where('id_kamar', $id_kamar);
      $this->db->update('kamar', $data);

      $this->db->delete('kamar_fasilitas', ['id_kamar' => $id_kamar]);

      foreach ($fasilitas as $id_fasilitas) {
          $this->db->insert('kamar_fasilitas', [
              'id_kamar' => $id_kamar,
              'id_fasilitas' => $id_fasilitas
          ]);
      }
      return true;
    }

    function hapus($id_kamar) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_kamar', $id_kamar);
      $this->db->delete('kamar');
    }

    public function get_fasilitas_by_kamar($id_kamar) {
      $this->db->select('id_fasilitas');
      $this->db->from('kamar_fasilitas');
      $this->db->where('id_kamar', $id_kamar);
  
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          return array_column($query->result_array(), 'id_fasilitas'); 
      } else {
          return [];
      }
    }

    public function get_last_nomor_kamar($id_member) {
      $this->db->select_max('nomor_kamar');
      $this->db->where('id_member', $id_member);
      $result = $this->db->get('kamar')->row_array();
  
      return isset($result['nomor_kamar']) ? $result['nomor_kamar'] : 0;
  }
  

  }
?>
