document.addEventListener('DOMContentLoaded', () => {
  let statusPembayaranElements = document.querySelectorAll(`.js-card-status-pembayaran`);

  statusPembayaranElements.forEach((statusPembayaran) => {
    
    if (statusPembayaran.innerText === `lunas`) {
      statusPembayaran.classList.add(`js-card-status-lunas`)

    } else if (statusPembayaran.innerText === `dekat`) {
      statusPembayaran.classList.add(`js-card-status-dekat`)

    } else if (statusPembayaran.innerText === `lewat`) {
      statusPembayaran.classList.add(`js-card-status-lewat`) 
    }
  });
});

