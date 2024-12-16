<?php 
  class Mpenyewa extends CI_Model {

    public function tampil() {
      $this->db->select('penyewa.*, kontrak.id_kamar, kamar.nomor_kamar, kamar.id_kamar, kontrak.tanggal_mulai, kontrak.status_pembayaran');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('penyewa.id_member', $this->session->userdata("id_member"));
      $query = $this->db->get();
      return $query->result_array();
    }
  
    public function detail($id_penyewa) {
      $this->db->select('penyewa.*, kontrak.id_kamar as kontrak_id_kamar, kamar1.nomor_kamar, kamar1.id_kamar as kamar_id_kamar, kontrak.tanggal_mulai, kontrak.status_pembayaran');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar as kamar1', 'kontrak.id_kamar = kamar1.id_kamar', 'left'); 
      $this->db->where('penyewa.id_member', $this->session->userdata("id_member"));
      $this->db->where('penyewa.id_penyewa', $id_penyewa);
      $query = $this->db->get();
      return $query->result_array();
    }
  
    function tambah($inputan) {
      $inputan['id_member'] = $this->session->userdata("id_member");
      $this->db->insert('penyewa', $inputan);
    }
  
    function ubah($inputan, $id_penyewa) {
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->where('id_member', $this->session->userdata("id_member")); 
  
      if (isset($inputan['foto_ktp']) && !empty($inputan['foto_ktp'])) {
          $this->db->update('penyewa', $inputan); 
      } else {
          unset($inputan['foto_ktp']);
          $this->db->update('penyewa', $inputan);
      }
    }
      
    function hapus($id_penyewa) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->delete('penyewa');
    }
  }
?>