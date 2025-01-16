<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo site_url("penyewa")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>"> 
        </a> 
      </div>
      <p class="page-title">Tambah Penyewa</p>
    </div>
  </div>

  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <?php echo form_open_multipart('penyewa/tambah'); ?>
  <?php if (isset($error_upload)): ?>
    <div class="alert alert-danger"><?php echo $error_upload; ?></div>
  <?php endif; ?>

    <div class="form-group">
      <label>Nama Penyewa</label>
      <input type="text" name="nama_penyewa" placeholder="Masukan Nama Penyewa" class="form-control">
    </div>
      
    <div class="form-group">
      <label>Nomor Telepon</label>
      <input type="text" name="nomor_telepon" placeholder="Masukan Nomor Telepon" class="form-control">
    </div>
            
    <div class="form-group py-2">
      <label for="foto_ktp">Berkas</label>
      <input type="file" name="foto_ktp" class="form-control" id="foto-to-display" onchange="previewImage()" >
    </div>

    <div class="display-uploaded-foto">
      <img id="image-preview" src="" alt="Uploaded Image"/>
    </div>
      
    <button type="submit" class="btn btn--green mt-3">Simpan</button>
  <?php echo form_close(); ?>
</div>
