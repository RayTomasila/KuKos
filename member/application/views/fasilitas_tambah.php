<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo site_url("fasilitas")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Tambah Fasilitas</p>
    </div>
  </div>  

    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open_multipart('fasilitas/tambah'); ?>
      <?php if (isset($error_upload)): ?>
        <div class="alert alert-danger"><?php echo $error_upload; ?></div>
      <?php endif; ?>
          
      <div class="form-group">
        <label for="nama_fasilitas">Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" placeholder="Masukan Nama Fasilitas">     
      </div>
      
      <div class="form-textarea">
        <label for="deskripsi">Deskripsi</label>
        <textarea type="textarea" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi Fasilitas" ></textarea>
      </div>

      <div class="form-group py-2">
        <label class="mb-2" for="foto_fasilitas">Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" id="foto_fasilitas" class="form-control" id="foto-to-display" onchange="previewImage()">        
      </div>

      <button type="submit" class="btn btn--green">Simpan</button>
      
    <?php echo form_close(); ?>
  </div>
</div>

