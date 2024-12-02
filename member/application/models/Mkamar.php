<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkamar extends CI_Model {

    public function get_all_kamar() {
        // Mengambil semua data kamar dari tabel `kamar`
        $query = $this->db->get('kamar');
        return $query->result();
    }

    public function tampil() {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      
      $q = $this->db->get('kamar');
      return $q->result_array();
    }
}
?>
