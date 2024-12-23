<div class="container container-custom mt-4">
<h2>UI'nya blum ada wkwk</h2>
    <button id="pay-button" class="btn btn--green mt-3">Bayar</button>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-BT-fGv3Nb3Tvb3hG"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay("<?php echo $snapToken; ?>", {
                onSuccess: function(result) {
                  alert("Payment success!");
                  window.location.href = "<?php echo base_url('../member/login'); ?>";
                },
                onPending: function(result) {
                  alert("Payment pending!");
                },
                onError: function(result) {
                  alert("Payment failed!");
                }
            });
        };
    </script>

</div>