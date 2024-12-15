document.addEventListener('DOMContentLoaded', () => {

  const searchInput = document.querySelector('.search-form input');
  const cards = document.querySelectorAll('.card-content');


  let statusPembayaranElements = document.querySelectorAll('.js-card-status-pembayaran');

  statusPembayaranElements.forEach((statusPembayaran) => {
    if (statusPembayaran.innerText === 'lunas') {
      statusPembayaran.classList.add('js-card-status-lunas');
    } else if (statusPembayaran.innerText === 'belum bayar') {
      statusPembayaran.classList.add('js-card-status-lewat');
    }
  });

  const nomorKamarSelect = document.getElementById('nomor_kamar');

  if (nomorKamarSelect) {
    nomorKamarSelect.addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      const harga = selectedOption.getAttribute('data-harga');

      if (harga) {
        const hargaNumber = parseFloat(harga);


        if (!isNaN(hargaNumber)) {
          const formattedHarga = new Intl.NumberFormat('id-ID').format(hargaNumber);
          document.getElementById('jumlah_pembayaran').value = formattedHarga;
        }
      }
    });
  }


  searchInput.addEventListener('input', function () {
    const query = searchInput.value.toLowerCase();
    console.log("Search Query:", query);

    cards.forEach(function (card) {
      const name = card.querySelector('.penyewa-nama').textContent.toLowerCase();
      console.log("Card Name:", name);

      if (name.includes(query)) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });

});
