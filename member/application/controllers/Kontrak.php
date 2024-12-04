<?php 

  class Kontrak extends CI_Controller {

    public function __construct() {
      parent::__construct();
      if (!$this->session->userdata("id_member")) {
          $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
          redirect('/', 'refresh'); 
      }

      if ($this->session->userdata("status_langganan") !== 'aktif') {
        $this->session->set_flashdata('pesan_gagal', 'Langganan Anda tidak aktif.');
        redirect('/', 'refresh');       
      
      }
      $this->load->model('Mmember'); 
      $this->load->model('Mpenyewa'); 
      $this->load->model('Mkamar');
      $this->load->model('Mkontrak');
    }

    public function index() {      

      $data['kontrak'] = $this->Mkontrak->tampil();

      $this->load->view('header');
      $this->load->view('kontrak_tampil', $data);
      $this->load->view('footer');
    }


    
  }