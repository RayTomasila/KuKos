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

    public function tambah() {      
      $data['penyewa'] = $this->Mpenyewa->tampil();
      $data['kamar'] = $this->Mkamar->tampil($this->session->userdata("id_member"));
    
      $inputan = $this->input->post();

      if ($inputan) {
  
          $this->Mkontrak->tambah($inputan);
          $this->session->set_flashdata('pesan_sukses', 'Kontrak Berhasil Ditambah!');
          redirect('kontrak', 'refresh');
      }
  
      $this->load->view('header');
      $this->load->view('kontrak_tambah', $data);
      $this->load->view('footer');
   }
  

   public function hapus($id_kontrak) {
    $this->Mkontrak->hapus($id_kontrak);
    
    $this->session->set_flashdata('pesan_sukses', 'Kontrak Berhasil dihapus');
    redirect('kontrak', 'refresh');
  }

    
  }