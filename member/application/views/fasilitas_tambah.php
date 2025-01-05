<div class="container container-custom container-custom">
<div class="container-top">
    <p class="page-title">Tambah Fasilitas</p>
  </div>

  <div>
    <?php if (!empty($error)) : ?>
       <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        
      <div class="form-group">
        <label for="nama_fasilitas">Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" required>     
      </div>
      
      <div class="form-group text-area-fasilitas">
        <label for="deskripsi">Deskripsi</label>
        <textarea type="textarea" name="deskripsi" id="deskripsi" rows="5" required></textarea>
      </div>

      <div class="form-group">
        <label for="foto_fasilitas">Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" id="foto_fasilitas"  class="form-control" required>        
      </div>

      <button type="submit" class="btn btn--green">Simpan</button>
      
    </form>
  </div>
</div>

