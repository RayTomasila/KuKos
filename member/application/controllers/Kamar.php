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
        $this->load->model('Mfasilitas');
        $this->load->model('Mkontrak');
        $this->load->library('form_validation');
      }

      public function index() {
        $data['kamar'] = $this->Mkamar->tampil();
        $this->load->view('header');
        $this->load->view('kamar_tampil', $data);
        $this->load->view('footer');
      }

      public function tambah() {
        $this->form_validation->set_rules(
            'harga_kamar', 
            'Harga Kamar', 
            'required|numeric', 
            [
                'required' => 'Harga Kamar Wajib Diisi.',
                'numeric' => 'Harga Kamar Harus Berupa Angka.'
            ]
        );
        
        if ($this->form_validation->run() == FALSE) {
            $id_member = $this->session->userdata('id_member');
            $data['fasilitas'] = $this->Mfasilitas->tampil($id_member);
            $this->load->view('header');
            $this->load->view('kamar_tambah', $data);
            $this->load->view('footer');
        } else {
            $foto_kamar = '';
            $config['upload_path'] = $this->config->item('assets_kamar');
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
    
            $this->load->library('upload', $config);
    
            if (!empty($_FILES['foto_kamar']['name'])) {
                if (!$this->upload->do_upload('foto_kamar')) {
                    $data['error_upload'] = 'Foto Harus JPG, JPEG, Atau PNG'; 
                    $id_member = $this->session->userdata('id_member');
                    $data['fasilitas'] = $this->Mfasilitas->tampil($id_member);
                    $this->load->view('header');
                    $this->load->view('kamar_tambah', $data);
                    $this->load->view('footer');
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $foto_kamar = $upload_data['file_name'];
                }
            }
    
            $status_kamar = $this->input->post('status_kamar');
            $harga_kamar = $this->input->post('harga_kamar');
            $id_member = $this->session->userdata('id_member');
            $jumlah_kamar = $this->input->post('jumlah_kamar');
            $last_nomor_kamar = $this->Mkamar->get_last_nomor_kamar($id_member);
            $nomor_kamar = $last_nomor_kamar + 1;
    
            for ($i = 0; $i < $jumlah_kamar; $i++) {
                $data = [
                    'nomor_kamar' => $nomor_kamar++,  
                    'status_kamar' => $status_kamar,
                    'harga_kamar' => $harga_kamar,
                    'foto_kamar' => $foto_kamar,
                    'id_member' => $id_member,
                ];
    
                $fasilitas = $this->input->post('id_fasilitas');
                $this->Mkamar->tambah_kamar($data, $fasilitas);
            }
    
            $this->session->set_flashdata('pesan_sukses', 'Kamar berhasil ditambahkan.');
            redirect('kamar', 'refresh');
        }
      }
    
    
    
      public function ubah($id_kamar) {
        $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required');
        $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'required');
        $this->form_validation->set_rules('fasilitas[]', 'Fasilitas Kamar', 'required');

        $this->form_validation->set_rules(
          'harga_kamar', 
          'Harga Kamar', 
          'required|number', 
          [
              'required' => 'Harga Kamar Wajib Diisi.',
              'number' => 'Harga Kamar Harus Berupa Angka.'
          ]
        );
    
        $data['kamar'] = $this->Mkamar->detail($id_kamar);
        $data['selected_fasilitas'] = $this->Mkamar->get_fasilitas_by_kamar($id_kamar);
        $data['all_fasilitas'] = $this->Mfasilitas->tampil($this->session->userdata('id_member'));
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('kamar_ubah', $data);
            $this->load->view('footer');
        } else {
            $config['upload_path'] = $this->config->item('assets_kamar');
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
    
            $foto_kamar = $data['kamar']->foto_kamar;
            if ($_FILES['foto_kamar']['name']) {
                if ($this->upload->do_upload('foto_kamar')) {
                    if ($foto_kamar && file_exists($this->config->item('assets_kamar') . $foto_kamar)) {
                        unlink($this->config->item('assets_kamar') . $foto_kamar);
                    }
                    $foto_kamar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
                    redirect('kamar/ubah/' . $id_kamar, 'refresh');
                }
            }
    
            $fasilitas = $this->input->post('fasilitas') ?: []; 
            $data_update = [
                'nomor_kamar' => $this->input->post('nomor_kamar'),
                'status_kamar' => $this->input->post('status_kamar'),
                'harga_kamar' => $this->input->post('harga_kamar'),
                'foto_kamar' => $foto_kamar,
            ];
    
            $this->Mkamar->ubah($id_kamar, $data_update, $fasilitas);
    
            $this->session->set_flashdata('pesan_sukses', 'Kamar berhasil diperbarui.');
            redirect('kamar', 'refresh');
        }
    }
    

      public function hapus($id_kamar) {
        $this->Mkamar->hapus($id_kamar);

        $this->session->set_flashdata('pesan_sukses', 'Kamar Berhasil dihapus');
        redirect('kamar', 'refresh');
      }
  }
?>
