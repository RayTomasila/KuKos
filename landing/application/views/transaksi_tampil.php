<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-BT-fGv3Nb3Tvb3hG"></script>
<button id="pay-button">Bayar Sekarang</button>

<script>
    var snapToken = '<?= addslashes($snapToken); ?>';

    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('<?php echo $snapToken ?>' , {
            onSuccess: function (result) {
                console.log('Payment success:', result);
                window.location.href = '<?php echo base_url('transaksi')  ?>';
            },
            onPending: function (result) {
                console.log('Payment pending:', result);
            },
            onError: function (result) {
                console.log('Payment error:', result);
            },
            onClose: function () {
                console.log('Payment popup closed.');
            }
        });
    });
</script>
