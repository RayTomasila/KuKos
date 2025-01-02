<?php
  class Transaksi extends CI_Controller {

    public function index() {
      $this->load->helper('custom');

      $this->load->model('Mtransaksi');
      $data['transaksi'] = $this->Mtransaksi->tampil();

      $this->load->view('header');
      $this->load->view('transaksi_tampil', $data);
      $this->load->view('footer');
    }
  }
?>