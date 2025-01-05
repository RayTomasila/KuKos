document.addEventListener('DOMContentLoaded', () => {
  window.addEventListener('resize', function () {
    const buttonsTambah = document.querySelectorAll('.btn-tambah');
    const buttonsHapusTop = document.querySelectorAll('.btn-hapus-top');
    const buttonsHapusBottom = document.querySelectorAll('.btn-hapus-bottom');
  
    buttonsTambah.forEach(buttonTambah => {
      if (window.innerWidth <= 420) {
        buttonTambah.innerHTML = '';
        buttonTambah.classList.remove('btn--green');
        buttonTambah.classList.add('btn--green--tambah');
      } else {
        buttonTambah.classList.remove('btn--green--tambah');
        buttonTambah.classList.add('btn--green');
      }
    });
  
    buttonsHapusTop.forEach(button => {
      button.style.display = window.innerWidth <= 420 ? 'none' : 'block';
    });
  
    buttonsHapusBottom.forEach(button => {
      button.style.display = window.innerWidth <= 420 ? 'block' : 'none';
    });
  
  window.dispatchEvent(new Event('resize'));
});

  let statusPembayaranElements = document.querySelectorAll('.js-card-status-pembayaran');

  statusPembayaranElements.forEach((statusPembayaran) => {
    if (statusPembayaran.innerText === 'lunas') {
      statusPembayaran.classList.add('js-card-status-lunas');
    } else if (statusPembayaran.innerText === 'belum bayar') {
      statusPembayaran.classList.add('js-card-status-belum-bayar');
    }
  });

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

  document.querySelectorAll('.text-muted').forEach(element => {
    if (element.textContent.trim() !== '') {
      element.style.marginBottom = '40px !important';
    }
  });
  
});

function previewImage() {
  const fileInput = document.getElementById('foto-to-display');
  const preview = document.getElementById('image-preview');
  const displayDiv = document.querySelector('.display-uploaded-foto');
  
  const file = fileInput.files[0];
  
  if (file) {
    const reader = new FileReader();

    reader.onload = function(e) {
      preview.src = e.target.result; 
      displayDiv.style.display = 'block'; 
    };

    reader.readAsDataURL(file); 
  }
}
