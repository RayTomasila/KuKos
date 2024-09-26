<?php 
    class Artikel extends CI_Controller {

        function index() {
            $this->load->model("Martikel");

            $data["artikel"] = $this->Martikel->tampil();

            $this->load->view("header");
            $this->load->view("artikel_tampil", $data);
            $this->load->view("footer");
        }
        
        function tambah() {
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules("judul_artikel", "Judul artikel", "required");
            $this->form_validation->set_message("required", "%s Wajib Diisi");
        
            $inputan = $this->input->post(); 
        
            if ($this->form_validation->run() == TRUE) {

                $this->load->model('Martikel');
                $this->Martikel->simpan($inputan); 
        
                $this->session->set_flashdata('pesan_sukses', 'Data artikel tersimpan');
            
                redirect('artikel', 'refresh');
            }

            $this->load->view('header');
            $this->load->view('artikel_tambah');
            $this->load->view('footer');
        }
        

        function hapus($id_artikel) {
            echo $id_artikel;
    
            $this->load->model('Martikel');
            $this->Martikel->hapus($id_artikel);
    
            $this->session->set_flashdata('pesan_sukses', 'artikel telah terhapus');
    
            redirect('artikel', 'refresh');
        }
    
        function edit($id_artikel) {
            $this->load->model("Martikel");
            $this->load->library("form_validation"); 
        
            $data['artikel'] = $this->Martikel->detail($id_artikel);
        
            $inputan = $this->input->post();
        

            $this->form_validation->set_rules("judul_artikel", "Judul artikel", "required");
            $this->form_validation->set_message("required", "%s Wajib Diisi");
        
            if ($this->form_validation->run() == TRUE) {
         
                $this->Martikel->edit($inputan, $id_artikel);
                $this->session->set_flashdata('pesan_sukses', 'artikel telah diubah');
     
                redirect('artikel', 'refresh');
            }
        
            $this->load->view("header");
            $this->load->view("artikel_edit", $data);
            $this->load->view("footer");
        }
        

    }

?>