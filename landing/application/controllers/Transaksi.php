<?php 
defined('BASEPATH') or exit('No direct script access allowed');

include 'midtrans-php/Midtrans.php';  

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mtransaksi');

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-arL8zxiAlvz4_ES4b9FRxGaC';  					
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$clientKey = 'SB-Mid-client-BT-fGv3Nb3Tvb3hG';  
        // Replace with your Midtrans client key
        \Midtrans\Config::$isProduction = false;  
        // Set to true if in production mode
        \Midtrans\Config::$isSanitized = true;  
        // Set sanitization on (default)
        \Midtrans\Config::$is3ds = true; 
         // Set 3DS transaction for credit card to true
    }

    public function index() {
      $id_member = $this->session->userdata('id_member');
      
      $id_langganan = $this->Mtransaksi->get_langganan_id_by_member($id_member);
      
      if (!$id_langganan) {
          $langganan_data = array(
              'status_langganan' => 'aktif',
              'tanggal_mulai' => date('Y-m-d H:i:s'),
              'tanggal_berakhir' => date('Y-m-d H:i:s', strtotime('+30 days')) 
          );
  
          $this->db->insert('langganan', $langganan_data);
  
          $id_langganan = $this->db->insert_id();
    
          $data = array(
              'kode_transaksi' => 'ORDER-' . uniqid(), 
              'jumlah_transaksi' => 20000, 
              'status_transaksi' => 'lunas',
              'id_member' => $id_member,  
              'id_langganan' => $id_langganan, 
              'tanggal_transaksi' => date('Y-m-d H:i:s'),
          );
  
          $this->Mtransaksi->insert_transaction($data);
  
          $this->session->set_userdata('id_langganan', $id_langganan);
      }
  
      $order_id = 'ORDER-' . uniqid(); 
  
      $params = array(
          'transaction_details' => array(
              'order_id' => $order_id,  
              'gross_amount' => 20000,  
          ),
          'customer_details' => array(
              'full_name' => $this->session->userdata('nama_lengkap_member'),
              'phone' => $this->session->userdata('nomor_telepon_member'), 
          ),
      );
  
      try {
          $snapToken = \Midtrans\Snap::getSnapToken($params);
          
          $data['snapToken'] = $snapToken;
          $data['order_id'] = $order_id; 
          $this->load->view('header');
          $this->load->view('transaksi_tampil', $data);
          $this->load->view('footer');
      } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
      }
  }
  
    public function payment_callback() {
        $response = json_decode(file_get_contents('php://input'), true);
        
        if (isset($response['transaction_status']) && $response['transaction_status'] == 'settlement') {
            $transaction_id = $response['order_id'];
            $transaction = $this->Mtransaksi->get_transaction_by_order_id($transaction_id);
            
            if ($transaction) {
                $this->Mtransaksi->update_transaction_status($transaction_id, 'lunas');
                echo "Payment successful";
            } else {
                echo "Transaction not found in the database.";
            }
        } else {
            echo "Payment failed or status not 'settlement'.";
        }
    }
}
