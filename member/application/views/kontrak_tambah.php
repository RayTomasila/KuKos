<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("kontrak")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Tambah Kontrak</p>
    </div>
  </div>
  
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open_multipart('kontrak/tambah'); ?>
      <?php if (isset($error_upload)): ?>
        <div class="alert alert-danger"><?php echo $error_upload; ?></div>
      <?php endif; ?>          
      
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

                <option value="<?php echo $value['id_kamar']?>" 

                  data-harga="<?php echo $value['harga_kamar'] ?>">
                  <?php echo $value['nomor_kamar'] ?> - <?php echo number_format($value['harga_kamar'], 0, ',', '.') ?>
                    
                </option>                

            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group">
          <label for="tanggal_mulai">Tanggal Masuk</label>
          <input type="text" name="tanggal_mulai" placeholder="Klik untuk pilih tanggal" id="tanggal_mulai" class="form-control">
        </div>

        <div class="form-group">
          <label for="tanggal_selesai">Tanggal Keluar</label>
          <input type="text" name="tanggal_selesai" placeholder="Klik untuk pilih tanggal" id="tanggal_selesai" class="form-control">
        </div>

        <div class="form-group">
        <label>Status Pembayaran</label>
        <select class="form-control form-select" name="status_pembayaran">
            <?php foreach ($statusOptions as $option): ?>
                <option value="<?php echo $option; ?>"><?php echo ucfirst($option); ?></option>
            <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="btn btn--green">Simpan</button>
    <?php echo form_close(); ?>
</div>