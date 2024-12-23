<div id="langganan">
  <div class="container container-custom container-transaksi">
    <div class="langgnan-card-container">
      <div class="langganan-left">
        <div class="langganan-text">
          <h1>Gabung KuKos Sekarang !</h1>
        </div>
          
        <div class="langganan-img">
          <img src="../public/assets/landing/transaksi-image.png" alt="">
        </div>
      </div>

      <div class="langganan-right">
        <div class="langganan-card">
          <div>
            <h1 class="langganan-harga">Rp 20.000</h1>
            <h2>Per 30 Hari</h2>
          </div>

          <div class="langganan-text">
            <p>Dengan berlangganan, kamu bisa menikmati semua fitur untuk mempermudah pengelolaan kosmu.
              Akses penuh, mudah, dan praktis, hanya dalam satu aplikasi KuKos!</p>
          </div>

          <div>          
            <button id="pay-button" class="btn-langganan mt-3"><span>Coba Sekarang !</span></button>

              <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" 
              data-client-key="SB-Mid-client-BT-fGv3Nb3Tvb3hG"></script>
              <script type="text/javascript">
                  document.getElementById('pay-button').onclick = function() {
                      snap.pay("<?php echo $snapToken; ?>", {
                          onSuccess: function(result) {
                            alert("Pembayaran Berhasil");
                            window.location.href = "<?php echo base_url('../member/login'); ?>";
                          },
                          onPending: function(result) {
                            alert("Pembayaran Pending!");
                          },
                          onError: function(result) {
                            alert("Pembayaran Gagal!");
                          }
                      });
                  };
              </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>