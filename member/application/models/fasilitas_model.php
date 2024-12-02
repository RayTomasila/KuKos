<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fasilitas_model extends CI_Model {
    
    // Fetch all fasilitas for a specific member
    public function getFasilitasByMember($id_member) {
        $this->db->where('id_member', $id_member);
        return $this->db->get('fasilitas')->result_array();
    }

    // Add new fasilitas
    public function addFasilitas($data) {
        $this->db->insert('fasilitas', $data);
    }
}
