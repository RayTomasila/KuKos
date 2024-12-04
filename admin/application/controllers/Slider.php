<?php 
    class Slider extends CI_Controller {

        function index() {
            $this->load->model("Mslider");

            $data["slider"] = $this->Mslider->tampil();

            $this->load->view("header");
            $this->load->view("slider_tampil", $data);
            $this->load->view("footer");
        }
        
        function tambah() {
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules("caption_slider", "Caption slider", "required");
            $this->form_validation->set_message("required", "%s Wajib Diisi");
        
            $inputan = $this->input->post(); 
        
            if ($this->form_validation->run() == TRUE) {

                $this->load->model('Mslider');
                $this->Mslider->tambah($inputan); 
        
                $this->session->set_flashdata('pesan_sukses', 'Data slider tersimpan');
            
                redirect('slider', 'refresh');
            }

            $this->load->view('header');
            $this->load->view('slider_tambah');
            $this->load->view('footer');
        }
        

        function hapus($id_slider) {
            echo $id_slider;
    
            $this->load->model('Mslider');
            $this->Mslider->hapus($id_slider);
    
            $this->session->set_flashdata('pesan_sukses', 'slider telah terhapus');
    
            redirect('slider', 'refresh');
        }
    
        function edit($id_slider) {
            $this->load->model("Mslider");
            $this->load->library("form_validation"); 
        
            $data['slider'] = $this->Mslider->detail($id_slider);
        
            $inputan = $this->input->post();
        

            $this->form_validation->set_rules("caption_slider", "Caption slider", "required");
            $this->form_validation->set_message("required", "%s Wajib Diisi");
        
            if ($this->form_validation->run() == TRUE) {
         
                $this->Mslider->edit($inputan, $id_slider);
                $this->session->set_flashdata('pesan_sukses', 'slider telah diubah');
     
                redirect('slider', 'refresh');
            }
        
            $this->load->view("header");
            $this->load->view("slider_edit", $data);
            $this->load->view("footer");
        }   
    }
?>
