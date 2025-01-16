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
      $this->load->library('form_validation');
      $this->load->helper('custom');

    }

    public function index() {
      $data['kontrak'] = $this->Mkontrak->tampil();
      $data['penyewaKontrak'] = $this->Mkontrak->count_penyewa();
      $data['kamarKontrak'] = $this->Mkontrak->count_kamar();
      
      $data['pembayaran_lunas_bulan_ini'] = $this->Mkontrak->count_pembayaran_lunas_bulan_ini();
      $data['pembayaran_belum_lunas_bulan_ini'] = $this->Mkontrak->count_pembayaran_belum_lunas_bulan_ini(); 
      $data['total_pembayaran_bulan_ini'] = $this->Mkontrak->count_total_pembayaran_bulan_ini(); 
      $data['incomeData'] = $this->Mkontrak->count_pembayaran_6_bulan_terakhir();  
    
      $this->load->view('header');
      $this->load->view('kontrak_tampil', $data);
      $this->load->view('footer');
    }
    
    public function tambah() {      
      $this->form_validation->set_rules('id_penyewa', 'Nama Penyewa', 'required', [
          'required' => 'Nama Penyewa Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('id_kamar', 'Nomor Kamar', 'required', [
          'required' => 'Nomor Kamar Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required', [
          'required' => 'Tanggal Mulai Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required', [
          'required' => 'Tanggal Selesai Wajib Diisi.'
      ]); 
  
      $data['penyewa'] = $this->Mpenyewa->tampil();
      $data['kamar'] = $this->Mkamar->tampil();
      $data['statusOptions'] = $this->Mkontrak->getEnumValues('kontrak', 'status_pembayaran');
  
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('kontrak_tambah', $data);
        $this->load->view('footer');
      } else {
        $inputan = $this->input->post();

        $tanggal_mulai = DateTime::createFromFormat('d/m/Y', $inputan['tanggal_mulai']);
        $tanggal_selesai = DateTime::createFromFormat('d/m/Y', $inputan['tanggal_selesai']);

        if ($tanggal_mulai && $tanggal_selesai) {
          $inputan['tanggal_mulai'] = $tanggal_mulai->format('Y-m-d');
          $inputan['tanggal_selesai'] = $tanggal_selesai->format('Y-m-d');

          $this->Mkontrak->tambah($inputan);
          $this->session->set_flashdata('pesan_sukses', 'Kontrak Berhasil Ditambah!');
          redirect('kontrak', 'refresh');
        } else {
          $this->session->set_flashdata('pesan_error', 'Format tanggal tidak valid!');
          redirect('kontrak/tambah', 'refresh');
        }
      }
    }
  
    public function ubah($id_kontrak) {    
      $this->form_validation->set_rules('id_penyewa', 'Nama Penyewa', 'required', [
          'required' => 'Nama Penyewa Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('id_kamar', 'Nomor Kamar', 'required', [
          'required' => 'Nomor Kamar Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required', [
          'required' => 'Tanggal Mulai Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required', [
          'required' => 'Tanggal Selesai Wajib Diisi.'
      ]); 
  
      $data['kontrak'] = $this->Mkontrak->detail($id_kontrak);
      $data['penyewa'] = $this->Mpenyewa->tampil();
      $data['kamar'] = $this->Mkamar->tampil();
      $data['statusOptions'] = $this->Mkontrak->getEnumValues('kontrak', 'status_pembayaran');
  
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('kontrak_ubah', $data);
        $this->load->view('footer');
      } else {
        $inputan = $this->input->post();
        $inputan['tanggal_mulai'] = DateTime::createFromFormat('d/m/Y', $inputan['tanggal_mulai'])->format('Y-m-d');
        $inputan['tanggal_selesai'] = DateTime::createFromFormat('d/m/Y', $inputan['tanggal_selesai'])->format('Y-m-d');

        $this->Mkontrak->ubah($inputan, $id_kontrak);
        $this->session->set_flashdata('pesan_sukses', 'Kontrak Berhasil Diubah!');
        redirect('kontrak', 'refresh');   
      }
    }

    public function hapus($id_kontrak) {
      $this->Mkontrak->hapus($id_kontrak);
      
      $this->session->set_flashdata('pesan_sukses', 'Kontrak Berhasil dihapus');
      redirect('kontrak', 'refresh');
    }  
  }
?>