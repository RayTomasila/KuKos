document.addEventListener('DOMContentLoaded', () => {

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

  // Cari Penyewa
  const searchInput = document.querySelector('.search-form input');
  const cards = document.querySelectorAll('.card-content');
  const container = document.querySelector('.card-container'); 
  
  const noResultsMessage = document.createElement('h4');
  noResultsMessage.textContent = 'Penyewa tidak ditemukan...';
  noResultsMessage.style.display = 'none';
  container.appendChild(noResultsMessage); 

  searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase();
    let anyVisible = false;
  
    cards.forEach(card => {
      const name = card.querySelector('.penyewa-nama').textContent.toLowerCase();
      card.style.display = name.includes(query) ? 'block' : 'none';
      if (name.includes(query)) anyVisible = true;
    });
  
    noResultsMessage.style.display = anyVisible ? 'none' : 'block';
  });

});
