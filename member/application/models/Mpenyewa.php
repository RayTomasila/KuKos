<?php 
  class Mpenyewa extends CI_Model {

    function tampil() {
      $q = $this->db->get('penyewa');
      $d = $q->result_array();  
  
      $this->db->select('penyewa.*, kamar.nomor_kamar, kontrak.tanggal_mulai');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left'); 
      $query = $this->db->get(); 
      
      $penyewa_data = $query->result_array();
      
      return [
        'penyewa' => $d,  
        'pkk' => $penyewa_data
      ];
    }
  
  
    function detail($id_penyewa) {
      $this->db->where('id_penyewa', $id_penyewa);

      $q = $this->db->get('penyewa');
      $d = $q->row_array();

      return $d;
    }
    
    function tambah($inputan) {
      $config['upload_path'] = $this->config->item("assets_penyewa");
      $config['allowed_types'] = 'jpeg|jpg|png'; 

      $this->load->library('upload', $config);

      $ngupload = $this->upload->do_upload("foto_penyewa");        

      if ($ngupload) {
          $upload_data = $this->upload->data();
          $inputan['foto_penyewa'] = $upload_data['file_name'];
      }

      $inputan['id_member'] = $this->session->userdata("id_member");

      $this->db->insert('penyewa', $inputan);
    }


    function ubah($inputan, $id) {
      $config['upload_path'] = $this->config->item("assets_penyewa");
      $config['allowed_types'] = 'jpeg|jpg|png';

      $this->load->library("upload", $config);
  
      $ngupload = $this->upload->do_upload("foto_penyewa");
  
      if ($ngupload) {
          $upload_data = $this->upload->data();
          $inputan['foto_penyewa'] = $upload_data['file_name'];
      }
  
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_penyewa', $id);
      $this->db->update('penyewa', $inputan);
    }
  
    function hapus($id_penyewa) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->delete('penyewa');
    }

  }
?>