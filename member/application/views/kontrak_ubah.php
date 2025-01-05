<div class="container container-custom">
  <div class="container-top">
    <p class="page-title">Ubah Kontrak</p>
  </div>

  <section>
    <form method="post" enctype="multipart/form-data">
      
      <div class="mb-3">
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

      <div class="mb-3">
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


      <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_mulai" value="<?php echo $kontrak['tanggal_mulai'] ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_selesai" value="<?php echo $kontrak['tanggal_selesai'] ?>" class="form-control">
      </div>

     <div class="mb-3">
      <label>Status Pembayaran</label>
      <select class="form-control form-select" name="status_pembayaran">
          <?php foreach ($statusOptions as $option): ?>
              <option value="<?php echo $option; ?>"><?php echo ucfirst($option); ?></option>
          <?php endforeach; ?>
      </select>
    </div>


      <button type="submit" class="btn btn--blue mt-3">Ubah Kontrak</button>

    </form>
  </section>
</div>
