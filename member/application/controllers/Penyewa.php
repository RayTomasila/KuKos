<?php 

  class Penyewa extends CI_Controller {

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
      $this->load->model('Mpenyewa'); 
      $this->load->model('Mmember'); 
      $this->load->model('Mkamar`');
    }

    public function index() {      
      $data['penyewa'] = $this->Mpenyewa->tampil();
            
      $this->load->view('header');
      $this->load->view('penyewa_tampil', $data);
      $this->load->view('footer');
    }

    public function detail($id_penyewa) {
      $data['penyewa'] = $this->Mpenyewa->detail($id_penyewa);
      
      $data['kamar'] = $this->Mkamar->tampil();

      $inputan = $this->input->post();

      if ($inputan) {
        $this->Mpenyewa->ubah($inputan, $id_penyewa);
        $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil Diubah!');
        redirect('penyewa/detail/' . $id_penyewa, 'refresh');
      }
      
      $this->load->view('header');
      $this->load->view('penyewa_detail', $data);
      $this->load->view('footer');
    }

    public function tambah() {
      $this->load->model('Mpenyewa');

      $inputan = $this->input->post();

      if ($inputan) {
        $this->Mpenyewa->tambah($inputan);
        $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil Ditambah!');
        redirect('penyewa', 'refresh');     
      }

      $this->load->view('header');
      $this->load->view('penyewa_tambah');
      $this->load->view('footer');
  }


    public function ubah($id_penyewa) {

      $this->load->model('Mpenyewa');
      $data['penyewa'] = $this->Mpenyewa->detail($id_penyewa);

      $this->load->model('Mkamar');
      $data['kamar'] = $this->Mkamar->tampil();

      $inputan = $this->input->post();

      if ($inputan) {
          $this->Mpenyewa->edit($inputan, $id_penyewa);
          $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil Diubah!');
          redirect('penyewa_detail', 'refresh');     
      }

      $this->load->view('header');
      $this->load->view('seller/penyewa_edit', $data);
      $this->load->view('footer');
   }


    public function hapus($id_penyewa) {
      $this->Mpenyewa->hapus($id_penyewa);
      
      $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil dihapus');
      redirect('penyewa', 'refresh');
    }




  }

?>