<div class="container">

  <pre>
    <?php print_r($fasilitas); ?>
  </pre>

  <div class="container-top">
    <p class="page-title">Informasi Fasilitas</p>

    <?php foreach ($fasilitas as $key => $value): ?>

      <a href="<?php echo base_url("fasilitas/hapus/". $value['id_fasilitas']); ?>" class="btn-bg-red">Hapus fasilitas</a>  

  </div>

  <section>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" value="<?php echo $value['nama_fasilitas']; ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label>Deskripsi Fasilitas</label>
        <textarea name="deskripsi" class="form-control"><?php echo $value['deskripsi']; ?></textarea>
      </div>

      <div class="mb-3">
        <label>Foto Fasilitas</label><br>
        <img src="<?php echo $this->config->item('url_fasilitas').$value['foto_fasilitas']; ?>" width="500"> 
      </div>

      <div class="mb-3">
        <label>Ganti Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" class="form-control w-25">
      </div>

      <button type="submit" class="btn-bg-blue mt-3">Ubah Data Fasilitas</button>
      
    </form>
    <?php endforeach; ?>
  </section>

</div>
</div>
