<div class="container">
  <div class="container-top">
    <p class="page-title">Daftar Fasilitas</p>

    <div>
      <a href="<?php echo base_url("fasilitas/tambah")?>" class="btn btn--green btn-tambah">Tambah Fasilitas</a>
    </div>
  </div>

  <div>
    <?php if (!empty($fasilitas)) : ?>
      <?php foreach ($fasilitas as $item) : ?>
        <div class="facility-card" onclick="window.location.href='<?php echo base_url('fasilitas/detail/'.$item['id_fasilitas']); ?>'">
          <div class="fasilitas-img-container">
            <img src="<?php echo ($this->config->item("url_fasilitas") . $item['foto_fasilitas']); ?>" alt="foto fasilitas">
          </div>
            
          <div>
            <p class="nama-fasilitas"><?php echo $item['nama_fasilitas']; ?> - <?php echo $item['deskripsi']; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>Tidak ada fasilitas yang tersedia.</p>
    <?php endif; ?>
  </div>
</div>