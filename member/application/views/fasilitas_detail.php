<div class="container mb-5 container-custom">
  <div class="container-top">
    <p class="page-title">Informasi Fasilitas</p>

    <?php foreach ($fasilitas as $key => $value): ?>
      <a href="<?php echo base_url("fasilitas/hapus/" . $value['id_fasilitas']); ?>" class="btn btn--red btn-hapus-top">Hapus</a>
  </div>

  <section>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group mb-3">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" value="<?php echo $value['nama_fasilitas']; ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label>Deskripsi Fasilitas</label>
        <textarea name="deskripsi" class="form-control"><?php echo $value['deskripsi']; ?></textarea>
      </div>

      <div class="form-group mb-3 foto-fasilitas">
        <label>Foto Fasilitas</label><br>
        <img src="<?php echo $this->config->item('url_fasilitas') . $value['foto_fasilitas']; ?>"> 
      </div>

      <div class="form-group mb-3">
        <label>Ganti Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" class="form-control">
      </div>

      <div class="button-ubah-hapus mt-3">
        <button type="submit" class="btn btn--green">Simpan</button>
        <a href="<?php echo base_url("fasilitas/hapus/" . $value['id_fasilitas']); ?>" class="btn btn--red btn-hapus-bottom">Hapus</a>
      </div>
    </form>
    <?php endforeach; ?>
  </section>
</div>
