<div class="container">
  <div class="container-top">
    <p class="page-title">Tambah Kontrak</p>
  </div>

  <form method="post" enctype="multipart/form-data">
      
      <div class="mb-3">
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

      <div class="mb-3">
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

      <div class="mb-3" style="color:black">
        <label>Total Bayar</label>
        <input type="text" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control">
      </div>

      <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_mulai" class="form-control">
      </div>
            
      <div class="mb-3">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_selesai" class="form-control">
      </div>

      <button type="submit" class="btn-bg-green mt-3">Tambah Kontrak</button>
    </form>
</div>
