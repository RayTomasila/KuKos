<div class="container container-custom">
  <div class="container-top">
    <p class="page-title">Informasi Kamar</p>

    <div>
      <a href="<?php echo site_url("kamar/hapus/" . $kamar->id_kamar) ?>" class="btn btn--red btn-hapus-top" onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">Hapus Kamar</a>
    </div>

  </div>
  
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open_multipart('kamar/ubah/' . $kamar->id_kamar); ?>

    <div class="form-group">
        <label for="nomor_kamar">Nomor Kamar</label>
        <input type="text" class="form-control mb-3" name="nomor_kamar" value="<?php echo set_value('nomor_kamar', $kamar->nomor_kamar); ?>">
    </div>

    <div class="form-group">
      <label for="status_kamar">Status Kamar</label>
      <select class="form-control form-select mb-3" name="status_kamar">
        <option value="siap huni">Siap Huni</option>
        <option value="digunakan">Digunakan</option>
      </select>
    </div>

    <div class="form-group">
        <label for="harga_kamar">Harga Kamar</label>
        <input type="text" class="form-control mb-3" name="harga_kamar" value="<?php echo set_value('harga_kamar', $kamar->harga_kamar); ?>">
    </div>

    <div class="form-group">
        <label for="id_fasilitas">ID Fasilitas</label>
        <input type="text" class="form-control mb-3" name="id_fasilitas" value="<?php echo set_value('id_fasilitas', $kamar->id_fasilitas); ?>">
    </div>

    <div class="form-group">
        <label for="foto_kamar">Foto Lama</label><br>
        <?php if ($kamar->foto_kamar): ?>
            <img src="<?php echo $this->config->item("url_penyewa"). $kamar->foto_kamar; ?>" alt="Foto Kamar" class="img-thumbnail mb-2" width="200">
        <?php endif; ?>
        <input type="file" class="form-control mb-3" name="foto_kamar">
    </div>

    <div class="button-ubah-hapus mt-3">
      <button type="submit" class="btn btn--green">Simpan</button>
      <a href="<?php echo base_url("kamar/hapus/" . $kamar->id_kamar); ?>" class="btn btn--red btn-hapus-bottom">Hapus</a>
    </div>

    <?php echo form_close(); ?>
</div>
