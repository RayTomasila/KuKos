<?php
  class Mfasilitas extends CI_Model {
      
    public function tampil($id_member) {
        $this->db->where('id_member', $id_member);
        return $this->db->get('fasilitas')->result_array();
    }

    public function detail($id_fasilitas) {
      $this->db->where('id_fasilitas', $id_fasilitas);
      $this->db->where('id_member', $this->session->userdata("id_member"));

      return $this->db->get('fasilitas')->row_array();
    }
    
    public function tambah($inputan) {
      $inputan['id_member'] = $this->session->userdata("id_member");
      $this->db->insert('fasilitas', $inputan);
    }
    
    function ubah($inputan, $id_fasilitas) {
      $inputan['id_member'] = $this->session->userdata("id_member"); 
      $this->db->where('id_fasilitas', $id_fasilitas);
      $this->db->where('id_member', $this->session->userdata("id_member")); 
      $this->db->update('fasilitas', $inputan); 
    }

    function hapus($id_fasilitas) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_fasilitas', $id_fasilitas);
      $this->db->delete('fasilitas');
    }

  }
