document.addEventListener('DOMContentLoaded', () => {
  // Handle the statusPembayaran logic
  let statusPembayaranElements = document.querySelectorAll('.js-card-status-pembayaran');

  statusPembayaranElements.forEach((statusPembayaran) => {
    if (statusPembayaran.innerText === 'lunas') {
      statusPembayaran.classList.add('js-card-status-lunas');
    } else if (statusPembayaran.innerText === 'dekat') {
      statusPembayaran.classList.add('js-card-status-dekat');
    } else if (statusPembayaran.innerText === 'lewat') {
      statusPembayaran.classList.add('js-card-status-lewat');
    }
  });

  // Handle the nomor_kamar change event to update Total Bayar
  const nomorKamarSelect = document.getElementById('nomor_kamar');

  if (nomorKamarSelect) {
    nomorKamarSelect.addEventListener('change', function() {
      const selectedOption = this.options[this.selectedIndex]; // Get the selected option
      const harga = selectedOption.getAttribute('data-harga'); // Get the 'data-harga' attribute value

      // Check if a valid room was selected and convert 'harga' to a number
      if (harga) {
        const hargaNumber = parseFloat(harga); // Convert to a number

        // Check if the conversion was successful
        if (!isNaN(hargaNumber)) {
          // Format the price to make it readable (add commas)
          const formattedHarga = new Intl.NumberFormat('id-ID').format(hargaNumber);

          // Set the 'jumlah_pembayaran' input field value with formatted price
          document.getElementById('jumlah_pembayaran').value = formattedHarga;
        }
      }
    });
  }
});
