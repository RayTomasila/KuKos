<div class="container wrapper-penyewa">

  <div class="container-top">
    <p class="page-title">Daftar Penyewa</p>

    <div class="search-form">
      <img src="../public/assets/member/penyewa/penyewa-search.png" alt="search logo">
      <input type="text" placeholder="Cari Penyewa..."></input>
    </div>

    <div>
      <a href="<?php echo base_url("penyewa/tambah")?>" class="btn-bg-green">Tambah Penyewa</a>
    </div>

  </div>
  
  <div class="card-container">
    <?php foreach ($penyewa as $key => $value): ?>
      <div 
        class="card-content" 
        onclick="window.location.href='<?php echo base_url('penyewa/detail/'.$value['id_penyewa']); ?>'">

        <div class="card-top">
          <p class="penyewa-nama"><?php echo $value['nama_penyewa'] ?></p>
          <p class="js-card-status-pembayaran"><?php echo $value['status_pembayaran'] ?></p>
        </div>

        <div class="card-item-container">
          <div class="card-items">
            <img src="../public/assets/member/penyewa/penyewa-wa.png" alt="wa logo">
            <!-- WhatsApp Number -->
            <p 
              class="penyewa-link-wa" 
              onclick="event.stopPropagation(); window.open('https://wa.me/<?php echo $value['nomor_telepon'] ?>', '_blank');">
            <?php echo $value['nomor_telepon'] ?>
            </p>
          </div>

          <div class="card-items">
            <img src="../public/assets/member/penyewa/penyewa-kamar.png" alt="kamar logo">
            <p>Kamar <?php echo $value['nomor_kamar'] ?></p>
          </div>

          <div class="card-items">
            <img src="../public/assets/member/penyewa/penyewa-tanggal-masuk.png" alt="date logo">
            <p>Sejak <?php echo  date("d F Y", strtotime($value['tanggal_mulai'])) ?></p>
          </div>
        </div>       

      </div>
    <?php endforeach ?>
  </div>
</div>