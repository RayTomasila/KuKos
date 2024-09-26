<?php 

    class Martikel extends CI_Model {

        function tampil() {
            $query = $this->db->get('artikel');
            $database = $query->result_array();
            
            return $database;
        }

        function simpan($inputan) {
            $config['upload_path'] = $this->config->item("assets_artikel");          
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
    
            $this->load->library('upload',$config);
    
            $ngupload = $this->upload->do_upload("foto_artikel");
    
            if ($ngupload) {
                $inputan ['foto_artikel'] = $this->upload->data("file_name");
            }
    
            $this->db->insert('artikel', $inputan);
        }
    
        function hapus($id_artikel) {
            $this->db->where('id_artikel', $id_artikel);
            $this->db->delete('artikel');
        }
    
        function detail($id_artikel) {
            $this->db->where('id_artikel', $id_artikel);
            $q = $this->db->get('artikel');
            $d = $q->row_array();
    
            return $d;
        }
    
        function edit($inputan, $id_artikel) {
            $config['upload_path'] = $this->config->item("assets_artikel");
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library("upload", $config);
        
            $ngupload = $this->upload->do_upload("foto_artikel");
        
            if ($ngupload) {
                $inputan['foto_artikel'] = $this->upload->data("file_name");
            }
        
            $this->db->where('id_artikel', $id_artikel);
            $this->db->update('artikel', $inputan);
        }
        

    }

?>