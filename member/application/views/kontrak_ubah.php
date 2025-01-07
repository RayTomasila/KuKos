<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("kontrak")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Informasi Kontrak</p>
    </div>
  </div>

  <section>
    <form method="post" enctype="multipart/form-data">
      
      <div class="form-group mb-2">
        <label>Nama Penyewa</label>
        <select class="form-control form-select" name="id_penyewa" id="nama_penyewa">
          <option value="<?php echo $kontrak['id_penyewa']; ?>"><?php echo $kontrak['nama_penyewa']; ?></option>

          <?php foreach ($penyewa as $p): ?>
            <?php if ($p['id_penyewa'] != $kontrak['id_penyewa']): ?> 
              <option value="<?php echo $p['id_penyewa']; ?>"><?php echo $p['nama_penyewa']; ?></option>
            <?php endif; ?>
          <?php endforeach; ?>

        </select>
      </div>

      <div class="form-group mb-2">
        <label>Kamar</label>
        <select class="form-control form-select" name="id_kamar" id="nomor_kamar">
          <option value="<?php echo $kontrak['id_kamar']; ?>"><?php echo $kontrak['nomor_kamar']; ?> - <?php echo number_format($kontrak['harga_kamar'], 0, ',', '.'); ?></option>

          <?php foreach ($kamar as $k): ?>
            <?php if ($k['id_kamar'] != $kontrak['id_kamar']): ?> 
              <option value="<?php echo $k['id_kamar']; ?>" data-harga="<?php echo $k['harga_kamar']; ?>">
                <?php echo $k['nomor_kamar']; ?> - <?php echo number_format($k['harga_kamar'], 0, ',', '.'); ?>
              </option>
            <?php endif; ?>
          <?php endforeach; ?>

        </select>
      </div>


      <div class="form-group mb-2">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_mulai" value="<?php echo $kontrak['tanggal_mulai'] ?>" class="form-control">
      </div>

      <div class="form-group mb-2">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_selesai" value="<?php echo $kontrak['tanggal_selesai'] ?>" class="form-control">
      </div>

     <div class="form-group mb-2">
      <label>Status Pembayaran</label>
      <select class="form-control form-select" name="status_pembayaran">
          <?php foreach ($statusOptions as $option): ?>
              <option value="<?php echo $option; ?>"><?php echo ucfirst($option); ?></option>
          <?php endforeach; ?>
      </select>
    </div>


      <button type="submit" class="btn btn--green">Simpan</button>

    </form>
  </section>
</div>
