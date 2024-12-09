<div class="container">

  <div class="container-top">
    <p class="page-title">Tambah Penyewa</p>
  </div>

  <form method="post" enctype="multipart/form-data">
      
    <div class="mb-3">
      <label>Nama Penyewa</label>
      <input type="text" name="nama_penyewa" class="form-control">
      <?php echo form_error('nama_penyewa', '<small class="text-danger">', '</small>'); ?>
    </div>
      
    <div class="mb-3">
      <label>Nomor Telepon</label>
      <input type="text" name="nomor_telepon" class="form-control">
      <?php echo form_error('nomor_telepon', '<small class="text-danger">', '</small>'); ?>
    </div>
            
    <div class="mb-3">
      <label>Berkas</label>
      <input type="file" name="foto_ktp" class="form-control">
      <?php echo form_error('foto_ktp', '<small class="text-danger">', '</small>'); ?>
    </div>
      
    <button type="submit" class="btn-bg-green mt-3">Tambah Penyewa</button>
  </form>

</div>
