<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("penyewa")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Tambah Penyewa</p>
    </div>
  </div>

  <form method="post" enctype="multipart/form-data">
      
    <div class="form-group">
      <label>Nama Penyewa</label>
      <input type="text" name="nama_penyewa" placeholder="Masukan Nama Penyewa" class="form-control">
      <?php echo form_error('nama_penyewa'); ?>
    </div>
      
    <div class="form-group">
      <label>Nomor Telepon</label>
      <input type="text" name="nomor_telepon" placeholder="Masukan Nomor Telepon" class="form-control">
      <?php echo form_error('nomor_telepon'); ?>
    </div>
            
    <div class="form-group py-2">
      <label for="foto_ktp">Berkas</label>
      <input type="file" name="foto_ktp" class="form-control" id="foto-to-display" onchange="previewImage()" <?php echo form_error('foto_ktp'); ?> >
    </div>

    <div class="display-uploaded-foto">
      <img id="image-preview" src="" alt="Uploaded Image"/>
    </div>
      
    <button type="submit" class="btn btn--green mt-3">Simpan</button>
  </form>

</div>
