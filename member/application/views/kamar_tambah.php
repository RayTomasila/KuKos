<div class="container my-4">
  <div class="container-top">
    <p class="page-title">Tambah Kamar</p>
  </div>

  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <?php echo form_open_multipart('kamar/tambah'); ?>

  <div class="form-group">
    <label for="nomor_kamar">Nomor Kamar</label>
    <input type="text" class="form-control mb-3" name="nomor_kamar" value="<?php echo set_value('nomor_kamar'); ?>">
  </div>

  <div class="form-group">
    <label for="status_kamar">Status Kamar</label>
    <select class="form-control mb-3" name="status_kamar">
      <option value="siap huni">Siap Huni</option>
      <option value="digunakan">Digunakan</option>
      <option value="digunakan">Tidak Aktif</option>
    </select>
  </div>

  <div class="form-group">
    <label for="harga_kamar">Harga Kamar</label>
    <input type="text" class="form-control mb-3" name="harga_kamar" value="<?php echo set_value('harga_kamar'); ?>">
  </div>

  <div class="form-group">
    <label for="id_fasilitas">ID Fasilitas</label>
    <input type="text" class="form-control mb-3" name="id_fasilitas" value="<?php echo set_value('id_fasilitas'); ?>">
  </div>

  <div class="form-group">
    <label for="foto_kamar">Foto Kamar</label>
    <input type="file" class="form-control mb-3" name="foto_kamar">
  </div>

  <button type="submit" class="btn-bg-green">Tambah Kamar</button>
  <?php echo form_close(); ?>
</div>