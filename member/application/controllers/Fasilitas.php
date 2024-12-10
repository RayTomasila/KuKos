<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fasilitas_model');
    }

    public function index() {
        $id_member = $this->session->userdata('id_member'); // Pastikan id_member tersimpan di session
        $data['fasilitas'] = $this->fasilitas_model->getFasilitasByMember($id_member);
        $this->load->view('header');
        $this->load->view('fasilitas', $data);
        $this->load->view('footer');
    }

    public function add() {
        // Load form view
        $this->load->view('header');
        $this->load->view('form_add_fasilitas');
        $this->load->view('footer');
    }

    public function save() {
        // Konfigurasi upload
        $config['upload_path'] = './uploads/fasilitas/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_fasilitas')) {
            $upload_data = $this->upload->data();
            $foto_fasilitas = $upload_data['file_name'];

            $data = [
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'deskripsi' => $this->input->post('deskripsi'),
                'foto_fasilitas' => $foto_fasilitas,
                'id_member' => $this->session->userdata('id_member')
            ];

            $this->fasilitas_model->addFasilitas($data);
            redirect('fasilitas');
        } else {
            $error = $this->upload->display_errors();
            $data['error'] = $error;
            $this->load->view('header');
            $this->load->view('form_add_fasilitas', $data);
            $this->load->view('footer');
        }
    }
}
