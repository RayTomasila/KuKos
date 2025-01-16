document.addEventListener('DOMContentLoaded', () => {
  const buttonsTambah = document.querySelectorAll('.btn-tambah');
  const buttonsHapusTop = document.querySelectorAll('.btn-hapus-top');
  const buttonsHapusBottom = document.querySelectorAll('.btn-hapus-bottom');

  const updateButtonStyles = () => {
    const isSmallScreen = window.innerWidth <= 420;
  
    buttonsTambah.forEach(buttonTambah => {
      if (isSmallScreen) {
        buttonTambah.innerHTML = '';
        buttonTambah.classList.remove('btn--green');
        buttonTambah.classList.add('btn--green--tambah');
      } else {
        buttonTambah.classList.remove('btn--green--tambah');
        buttonTambah.classList.add('btn--green');
      }
    });
  
    buttonsHapusTop.forEach(button => {
      button.style.display = isSmallScreen ? 'none' : 'block';
    });

    buttonsHapusBottom.forEach(button => {
      button.style.display = isSmallScreen ? 'block' : 'none';
    });
  };

  updateButtonStyles();
  window.addEventListener('resize', updateButtonStyles);


  document.body.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-hapus') || e.target.closest('.btn-hapus')) {
      e.preventDefault();
      const deleteUrl = e.target.closest('.btn-hapus').getAttribute('data-href');
  
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data ini akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgb(203, 48, 64)',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = deleteUrl;
        }
      });
    }
  });
});

let statusPembayaranElements = document.querySelectorAll('.js-card-status-pembayaran');

statusPembayaranElements.forEach((statusPembayaran) => {
  const capitalizeFirstLetter = (str) => str.charAt(0).toUpperCase() + str.slice(1);

  if (statusPembayaran.innerText.toLowerCase() === 'lunas') {
    statusPembayaran.classList.add('js-card-status-lunas');
    statusPembayaran.innerText = capitalizeFirstLetter('lunas');
    
  } else if (statusPembayaran.innerText.toLowerCase() === 'belum bayar') {
    statusPembayaran.classList.add('js-card-status-belum-bayar');
    statusPembayaran.innerText = capitalizeFirstLetter('belum lunas');
  }
});


  // Cari Penyewa
  const searchInput = document.querySelector('.search-form input');
  const cards = document.querySelectorAll('.card-content');
  const container = document.querySelector('.js-card-container'); 

  const noResultsMessage = document.createElement('p');
  noResultsMessage.className = 'page-title';
  noResultsMessage.textContent = 'Penyewa tidak ditemukan';
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

