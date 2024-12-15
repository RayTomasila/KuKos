<?php
defined('BASEPATH') or exit('No direct script access allowed');

  class Kamar extends CI_Controller {

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
      $this->load->model('Mkamar');
      $this->load->model('Mkontrak');
    }

    public function index() {  
      $data['kamar'] = $this->Mkamar->tampil();
  
      $this->load->view('header');
      $this->load->view('kamar_tampil', $data);
      $this->load->view('footer');
    }
  
    public function tambah() {
      if ($this->session->userdata("status_langganan") !== 'aktif') {
        $this->session->set_flashdata('pesan_gagal', 'Langganan Anda tidak aktif.');
        redirect('kamar', 'refresh');
      }

      $this->load->library('form_validation');
      $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required');
      $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'required');
      $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required|numeric');
      $this->form_validation->set_rules('id_fasilitas', 'ID Fasilitas', 'required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('kamar_tambah');
        $this->load->view('footer');
      } else {
        $config['upload_path'] = $this->config->item("assets_kamar");
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_kamar')) {
          $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
          redirect('kamar/tambah', 'refresh');
        } else {
          $upload_data = $this->upload->data();
          $foto_kamar = $upload_data['file_name'];

          $data = [
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'status_kamar' => $this->input->post('status_kamar'),
            'harga_kamar' => $this->input->post('harga_kamar'),
            'foto_kamar' => $foto_kamar,
            'id_fasilitas' => $this->input->post('id_fasilitas'),
            'id_member' => $this->session->userdata('id_member'),
          ];

          $this->Mkamar->tambah($data);
          $this->session->set_flashdata('pesan_sukses', 'Kamar berhasil ditambahkan.');
          redirect('kamar', 'refresh');
        }
      }
    }

    public function ubah($id_kamar) {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required');
      $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'required');
      $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required|numeric');
      $this->form_validation->set_rules('id_fasilitas', 'ID Fasilitas', 'required');

      $data['kamar'] = $this->Mkamar->detail($id_kamar);

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('kamar_ubah', $data);
        $this->load->view('footer');
      } else {
        $config['upload_path'] = $this->config->item("assets_kamar");;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        $foto_kamar = $data['kamar']->foto_kamar;
        if ($_FILES['foto_kamar']['name']) {
          if ($this->upload->do_upload('foto_kamar')) {
            if ($foto_kamar && file_exists($this->config->item("assets_kamar") . $foto_kamar)) {
              unlink($this->config->item("assets_kamar") . $foto_kamar);
            }
            $foto_kamar = $this->upload->data('file_name');
          } else {
            $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
            redirect('kamar/ubah/' . $id_kamar, 'refresh');
          }
        }

        $data_update = [
          'nomor_kamar' => $this->input->post('nomor_kamar'),
          'status_kamar' => $this->input->post('status_kamar'),
          'harga_kamar' => $this->input->post('harga_kamar'),
          'foto_kamar' => $foto_kamar,
          'id_fasilitas' => $this->input->post('id_fasilitas'),
        ];

        $this->Mkamar->ubah($id_kamar, $data_update);
        $this->session->set_flashdata('pesan_sukses', 'Kamar berhasil diperbarui.');
        redirect('kamar', 'refresh');
      }
    }
  }
?>