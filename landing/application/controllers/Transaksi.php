<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller {
  public function index() {
    $snapToken = "";

    // Include Midtrans Library
    include 'midtrans-php/Midtrans.php';

    // Configure Midtrans
    \Midtrans\Config::$serverKey = 'SB-Mid-server-arL8zxiAlvz4_ES4b9FRxGaC';
    \Midtrans\Config::$isProduction = false; // Set to true for production
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Transaction Details
    $order_id = 'ORDER-' . time(); // Unique order ID using current timestamp
    $gross_amount = 20000; // Price is set to 20,000 IDR

    $transaction_details = array(
        'order_id' => $order_id,
        'gross_amount' => $gross_amount,
    );

    // Customer Details
    $customer_details = array(
        'first_name' => $this->session->userdata('name'),
        'phone' => $this->session->userdata('phone'),
    );

    // Midtrans Parameters
    $params = array(
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
    );

    try {
        // Generate the snap token for the frontend payment page
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    } catch (Exception $e) {
        // Handle error (optional)
        log_message('error', 'Error generating Snap token: ' . $e->getMessage());
    }

    // Process payment after user is redirected back from Midtrans
    if ($this->input->post()) {
        // Check if the transaction is valid (based on data sent by user from frontend)
        $order_id = $this->input->post('order_id');
        $gross_amount = $this->input->post('gross_amount');
        
        // Call the Midtrans API to verify transaction status
        $this->verify_transaction_status($order_id, $gross_amount);
    }

    // Pass Snap Token to the View
    $data['snapToken'] = $snapToken;
    $this->load->view('transaksi_tampil', $data);  // Only call this once
  }

  private function verify_transaction_status($order_id, $gross_amount) {
    // Make API call to Midtrans to check the transaction status
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order_id . "/status",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: Basic U0ItTWlkLXNlcnZlci1hckw4enhpQWx2ejRfRVM0YjlGUnhHYUM6YW1pa29t"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        log_message('error', "cURL Error: " . $err);
    } else {
        $result = json_decode($response, true);

        log_message('debug', 'Midtrans Response: ' . print_r($result, true));

        // Check if the transaction is successful (settlement)
        if (isset($result['transaction_status']) && $result['transaction_status'] == 'settlement') {
            // Prepare langganan data
            $langganan_data = array(
                'tanggal_mulai' => date('Y-m-d H:i:s'),
                'tanggal_berakhir' => date('Y-m-d H:i:s', strtotime('+30 days')), // Assuming 30 days subscription period
                'status_langganan' => 'aktif'
            );

            // Start database transaction
            $this->db->trans_start();

            // Insert langganan data
            $this->db->insert('langganan', $langganan_data);
            if ($this->db->affected_rows() > 0) {
                log_message('debug', 'Langganan inserted successfully');
            } else {
                log_message('error', 'Langganan insert failed');
            }

            // Get the newly inserted langganan ID
            $id_langganan = $this->db->insert_id();
            log_message('debug', 'New Langganan ID: ' . $id_langganan);

            // Prepare transaksi data with the langganan ID
            $transaksi_data = array(
                'kode_transaksi' => $result['order_id'],
                'jumlah_transaksi' => $result['gross_amount'],
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
                'status_transaksi' => 'lunas', // Mark the transaction as paid
                'id_member' => $this->session->userdata('id_member'),
                'id_langganan' => $id_langganan // Correct the langganan ID here
            );

            // Insert transaksi data
            $this->db->insert('transaksi', $transaksi_data);
            if ($this->db->affected_rows() > 0) {
                log_message('debug', 'Transaksi inserted successfully');
            } else {
                log_message('error', 'Transaksi insert failed');
            }

            // Complete the transaction
            $this->db->trans_complete();

            // Check if transaction was successful
            if ($this->db->trans_status() === FALSE) {
                log_message('error', 'Database transaction failed');
            } else {
                log_message('debug', 'Transaction completed successfully');
            }

            // Redirect to the transaction detail page or wherever needed
            redirect('transaksi' . $result['order_id']);
        } else {
            log_message('debug', 'Transaction failed or not captured: ' . print_r($result, true));
        }
    }
}


}
?>
