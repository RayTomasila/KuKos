<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kamar_model');
    }

    public function index() {
        // Ambil data kamar dari model
        $data['kamar'] = $this->Kamar_model->get_all_kamar();

        // Muat view dengan data kamar
        $this->load->view('header');
        $this->load->view('kamar', $data);
        $this->load->view('footer');
    }
}
?>
