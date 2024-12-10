<div class="container mb-5">
<div class="container-top">
    <p class="page-title">Tambah Fasilitas</p>
  </div>

  <div>
    <?php if (!empty($error)) : ?>
       <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        
      <div class="mb-3">
        <label for="nama_fasilitas">Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" required>     
      </div>
      
      <div class="mb-3 text-area-fasilitas">
        <label for="deskripsi">Deskripsi</label>
        <textarea type="textarea" name="deskripsi" id="deskripsi" rows="5" required></textarea>
      </div>

      <div class="mb-3">
        <label for="foto_fasilitas">Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" id="foto_fasilitas"  class="form-control" required>        
      </div>

      <button type="submit" class="btn-bg-green">Simpan</button>
      
    </form>
  </div>
</div>

