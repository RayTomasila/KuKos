<div class="container container-content">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("kamar")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Tambah Kamar</p>
    </div>

    <div>
      <a href="<?php echo base_url("kamar/tambah") ?>" class="btn btn--green btn-tambah">Tambah kamar</a>
    </div>

  </div>

  <div class="kamar-container mt-4">
    <?php foreach ($kamar as $item): ?>

      <div class="kamar-card"
        onclick="window.location.href='<?php echo site_url('kamar/ubah/' . $item['id_kamar']); ?>'">

        <div class="container-foto-kamar">
          <img src="<?php echo $this->config->item("url_kamar") . $item['foto_kamar']; ?>" alt="foto_kamar" class="mb-4">
        </div>

        <h4>Kamar - <?php echo $item['nomor_kamar']; ?></h4>

        <div class="kamar-card-items">
          <img src="../public/assets/member/kamar/logo-penyewa-kamar.png" alt="">
          <p><?php echo $item['nama_penyewa'] ?? 'Tidak ada penyewa'; ?></p>
        </div>

        <div class="kamar-card-items">
          <img src="<?php echo base_url('../public/assets/member/kamar/logo-fasilitas-kamar.png'); ?>" alt="">
          <?php 
          if (!empty($item['fasilitas_list'])): 
            $fasilitas = explode(',  ', $item['fasilitas_list']); 
            $count = 0;
            foreach ($fasilitas as $f): 
              if ($count >= 2) break; 
              ?>
              <p><?php echo $f; ?></p>...     
              <?php
              $count++;
            endforeach;
          else: ?>
            <p>Tidak ada fasilitas</p>
          <?php endif; ?>
        </div>



        <p class="mb-3"><?php echo number_format($item['harga_kamar'], 0, ',', '.'); ?></p>

        <p>
          <span class="
            <?php
              echo ($item['status_kamar'] == 'digunakan') ? 'status-digunakan' : 
                   ($item['status_kamar'] == 'siap huni' ? 'status-siap-huni' : 'status-tidak-aktif'); ?>">
              <?php echo ucfirst($item['status_kamar']); 
            ?>
          </span>
        </p>

      </div>
    <?php endforeach; ?>
  </div>
</div>