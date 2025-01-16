<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("kamar")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Informasi Kamar</p>
    </div>

    <div>
      <a href="#" class="btn btn--red btn-hapus btn-hapus-top" data-href="<?php echo site_url("kamar/hapus/" . $kamar->id_kamar); ?>">Hapus Kamar</a>
    </div>
  </div>
  
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open_multipart('kamar/ubah/' . $kamar->id_kamar); ?>

    <div class="form-group">
      <label for="nomor_kamar">Nomor Kamar</label>
      <input type="text" class="form-control" name="nomor_kamar" 
      value="<?php echo set_value('nomor_kamar', $kamar->nomor_kamar); ?>" 
      readonly>
    </div>

    <div class="form-group">
      <label for="status_kamar">Status Kamar</label>
      <select class="form-control form-select" name="status_kamar">
        <option value="siap huni">Siap Huni</option>
        <option value="digunakan">Digunakan</option>
      </select>
    </div>

    <div class="form-group">
        <label for="harga_kamar">Harga Kamar</label>
        <input type="number" class="form-control" name="harga_kamar" value="<?php echo set_value('harga_kamar', $kamar->harga_kamar); ?>">
    </div>


    <div class="checkbox-tambah-fasilitas">
      <label for="fasilitas">Fasilitas Kamar</label><br>
      <?php foreach ($all_fasilitas as $fasilitas): ?>
        <div class="mb-1">
          <input 
            type="checkbox" 
            class="form-check-input" 
            name="fasilitas[]" 
            value="<?php echo $fasilitas['id_fasilitas']; ?>" 
            <?php echo in_array($fasilitas['id_fasilitas'], $selected_fasilitas) ? 'checked' : ''; ?>
          >
          <label><?php echo $fasilitas['nama_fasilitas']; ?></label>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="form-group py-2">
        <label for="foto_kamar">Foto kamar</label><br>
        <div class="display-foto-kamar mb-3">
          <img src="<?php echo $this->config->item("url_kamar"). $kamar->foto_kamar ?>" alt="Foto Kamar">
        </div>

        <input type="file" class="form-control" name="foto_kamar">
    </div>

    <div class="button-ubah-hapus">
      <button type="submit" class="btn btn--green">Simpan</button>
      <a href="#" class="btn btn--red btn-hapus btn-hapus-bottom" data-href="<?php echo site_url("kamar/hapus/" . $kamar->id_kamar); ?>">Hapus</a>
    </div>

    <?php echo form_close(); ?>
</div>
