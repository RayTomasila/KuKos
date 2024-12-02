<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {

    public function get_all_kamar() {
        // Mengambil semua data kamar dari tabel `kamar`
        $query = $this->db->get('kamar');
        return $query->result();
    }
}
?>
