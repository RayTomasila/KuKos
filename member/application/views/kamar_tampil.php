<div class="container my-4">
  <div class="header-container">
      <h2>Daftar Kamar</h2>
      <a href="<?php echo base_url('kamar/tambah'); ?>" class="btn btn-success">Tambah Kamar</a>
  </div>
  
  <div class="kamar-container mt-4">
    <?php foreach ($kamar as $item): ?>
      <div class="kamar-card" 
           onclick="window.location.href='<?php echo site_url('kamar/ubah/' . $item['id_kamar']); ?>'" 
           style="cursor: pointer; border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px;">

        <img src="<?php echo $this->config->item("url_kamar") . $item['foto_kamar']; ?>" alt="foto_kamar" class="mb-4">

        <h4>Kamar - <?php echo $item['nomor_kamar']; ?></h4>
        <p>Harga: Rp <?php echo number_format($item['harga_kamar'], 0, ',', '.'); ?></p>
        <p>Fasilitas: <?php echo $item['nama_fasilitas'] ?? 'Tidak ada fasilitas'; ?></p>
        <!-- <p>ID Member: <?php echo $item['id_member'] ?? '-'; ?></p> -->
        <p>Status: 
            <span class="<?php 
                echo ($item['status_kamar'] == 'digunakan') ? 'status-digunakan' : 
                      ($item['status_kamar'] == 'siap huni' ? 'status-siap-huni' : 
                      'status-tidak-aktif'); ?>">
                <?php echo ucfirst($item['status_kamar']); ?>
            </span>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</div>
