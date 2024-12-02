<?php 
  class Mpenyewa extends CI_Model {

    private function queryTampilPenyewaJoin($id_penyewa = null) {
      $this->db->select('penyewa.*, kontrak.id_kamar, kamar.nomor_kamar, kamar.id_kamar, kontrak.tanggal_mulai, kontrak.status_pembayaran');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('penyewa.id_member', $this->session->userdata("id_member"));
  
      if ($id_penyewa !== null) {
        $this->db->where('penyewa.id_penyewa', $id_penyewa);
      }
  
      $query = $this->db->get();
      return $query->result_array();
    }

    public function tampil() {
      return $this->queryTampilPenyewaJoin(null);
    }
  
    public function detail($id_penyewa) {
      return $this->queryTampilPenyewaJoin($id_penyewa); 
    }
    
    function tambah($inputan) {
      $config['upload_path'] = $this->config->item("assets_penyewa");
      $config['allowed_types'] = 'jpeg|jpg|png'; 

      $this->load->library('upload', $config);

      $ngupload = $this->upload->do_upload("foto_ktp");        

      if ($ngupload) {
        $upload_data = $this->upload->data();
        $inputan['foto_ktp'] = $upload_data['file_name'];
      }

      $inputan['id_member'] = $this->session->userdata("id_member");

      $this->db->insert('penyewa', $inputan);
    }

    function ubah($inputan, $id_penyewa) {

      // update foto
      $config['upload_path'] = $this->config->item("assets_penyewa");
      $config['allowed_types'] = 'jpeg|jpg|png';
  
      $this->load->library("upload", $config);
      $ngupload = $this->upload->do_upload("foto_ktp");
  
      if ($ngupload) {
        $upload_data = $this->upload->data();
        $inputan['foto_ktp'] = $upload_data['file_name'];

        // Hapus dulu file lama kalo ada
        $this->db->where('id_penyewa', $id_penyewa);
        $penyewa = $this->db->get('penyewa')->row_array();

        if (!empty($penyewa['foto_ktp'])) {
            $file_path = $this->config->item("assets_penyewa") . $penyewa['foto_ktp'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
      }
      
      // update data penyewa
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->update('penyewa', $inputan);

    }  


    
  
  
    function hapus($id_penyewa) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->delete('penyewa');
    }

  }
?>