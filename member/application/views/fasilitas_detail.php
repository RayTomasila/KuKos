<div class="container mb-5 container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("fasilitas")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>">
        </a> 
      </div>
      <p class="page-title">Informasi Fasilitas</p>
    </div>
    
    <?php foreach ($fasilitas as $key => $value): ?>      
    <a href="#" class="btn btn--red btn-hapus btn-hapus-top" data-href="<?php echo site_url("fasilitas/hapus/" . $value['id_fasilitas']); ?>">Hapus Fasilitas</a>
  </div>

  <section>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" value="<?php echo $value['nama_fasilitas']; ?>" class="form-control">
      </div>

      <div class="form-textarea">
        <label>Deskripsi Fasilitas</label>
        <textarea name="deskripsi" class="form-control"><?php echo $value['deskripsi']; ?></textarea>
      </div>

      <div class="form-group py-2">
        <label for="foto_kamar">Foto Fasilitas</label><br>
        <div class="display-foto-kamar mb-3">
          <img src="<?php echo $this->config->item("url_fasilitas"). $value['foto_fasilitas']?>" alt="Foto Fasilitas">
        </div>

        <input type="file" class="form-control" name="foto_fasilitas">
    </div>

      <div class="button-ubah-hapus mt-3">
        <button type="submit" class="btn btn--green">Simpan</button>
        <a href="<?php echo base_url("fasilitas/hapus/" . $value['id_fasilitas']); ?>" class="btn btn--red btn-hapus btn-hapus-bottom">Hapus</a>
      </div>
    </form>
    <?php endforeach; ?>
  </section>
</div>
