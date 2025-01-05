<div class="container container-custom">
  <div class="container-top">
    <p class="page-title">Tambah Kontrak</p>
  </div>
  
  <form method="post" enctype="multipart/form-data">
      
      <div class="form-group">
        <label>Penyewa</label>
        <select class="form-control form-select" name="id_penyewa">
            <option value="">Pilih Penyewa</option>

            <?php foreach ($penyewa as $key => $value) : ?>              
                <option value="<?php echo $value['id_penyewa'] ?>">
                    <?php echo $value['nama_penyewa'] ?>
                </option>         
            <?php endforeach ?>
            
        </select>
      </div>

      <div class="form-group">
        <label>Kamar</label>
        <select class="form-control form-select" name="id_kamar" id="nomor_kamar">
          <option value="">Pilih Kamar</option>
          <?php foreach ($kamar as $key => $value) : ?>           

              <option value="<?php echo $value['id_kamar'] ?>" 

                data-harga="<?php echo $value['harga_kamar'] ?>">
                <?php echo $value['nomor_kamar'] ?> - <?php echo number_format($value['harga_kamar'], 0, ',', '.') ?>
                  
              </option>                

          <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_mulai" class="form-control">
      </div>
            
      <div class="form-group">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_selesai" class="form-control">
      </div>

      <div class="form-group">
      <label>Status Pembayaran</label>
      <select class="form-control form-select" name="status_pembayaran">
          <?php foreach ($statusOptions as $option): ?>
              <option value="<?php echo $option; ?>"><?php echo ucfirst($option); ?></option>
          <?php endforeach; ?>
      </select>
    </div>

      <button type="submit" class="btn btn--green mt-3">Tambah Kontrak</button>
    </form>
</div>
