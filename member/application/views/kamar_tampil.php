<div class="container my-4">
  <div class="container-top">
    <p class="page-title">Daftar Kamar</p>

    <div>
      <a href="<?php echo base_url("kamar/tambah")?>" class="btn-bg-green">Tambah Kamar</a>
    </div>

  </div>
  
  <div class="kamar-container mt-4">
    <?php foreach ($kamar as $item): ?>
      <div class="kamar-card">
        <img src="<?php echo $this->config->item("url_kamar") . $item['foto_kamar']; ?>" alt="foto_kamar" class="mb-4">

        <h4>Kamar - <?php echo $item['nomor_kamar']; ?></h4>
        <p><?php echo number_format($item['harga_kamar'], 0, ',', '.'); ?></p>
        <p><?php echo $item['id_fasilitas']; ?></p>

        <p>
            <span class="<?php 
                echo ($item['status_kamar'] == 'digunakan') ? 'status-digunakan' : 
                      ($item['status_kamar'] == 'siap huni' ? 'status-siap-huni' : 
                      'status-tidak-aktif'); ?>">
                <?php echo ucfirst($item['status_kamar']); ?>
            </span>
        </p>
        
        <!-- Tambahkan Tombol Edit -->
        <div class="mt-3">
          <a href="<?php echo site_url('kamar/ubah/' . $item['id_kamar']); ?>" class="btn btn-warning btn-sm">Edit</a>
          <!-- Opsional: Tombol Hapus -->
          <a href="<?php echo site_url('kamar/hapus/' . $item['id_kamar']); ?>" 
             class="btn btn-danger btn-sm" 
             onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">
             Hapus
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
