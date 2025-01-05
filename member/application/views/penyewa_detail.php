<div class="container container-custom">

  <div class="container-top">
    <p class="page-title">Informasi Penyewa</p>
    
    <?php foreach ($penyewa as $key => $value): ?>
    
    <a href="<?php echo base_url("penyewa/hapus/". $value['id_penyewa'])?>" class="btn btn--red btn-hapus-top"> Hapus Penyewa</a>  
  </div>

  <!-- form Ubah Data Penyewa START -->
  <section>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group mb-3">
        <label>Nama</label>
        <input type="text" name="nama_penyewa" value="<?php echo $value['nama_penyewa'] ?>" class="form-control">
      </div>

      <div class="form-group mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="<?php echo $value['nomor_telepon'] ?>" class="form-control">
      </div>

      <div class="ktp-dropdown mb-3">
        <input type="checkbox" id="foto-toggle">
        <label for="foto-toggle" class="dropdown-label">
          Berkas
          <span class="arrow"></span>
        </label>
        <div class="foto-dropdown-content mb-5">
          <img src="<?php echo $this->config->item('url_penyewa') . $value['foto_ktp']; ?>" alt="Uploaded Berkas">
        </div>
      </div>


      <div class="form-group">
        <label>Ganti Foto Berkas</label>
        <input type="file" name="foto_ktp" class="form-control custom-input" id="foto-to-display" onchange="previewImage()">
      </div>

      <div class="display-uploaded-foto">
        <img id="image-preview" src="" alt="Uploaded Image"/>
      </div>

      <div class="button-ubah-hapus">
        <button type="submit" class="btn btn--green">Simpan</button>
        <a href="<?php echo base_url("penyewa/hapus/" . $value['id_penyewa']); ?>" class="btn btn--red btn-hapus-bottom">Hapus</a>
      </div>
    </form>
    <?php endforeach;?>
  </section>
<!-- form Ubah Data Penyewa END -->


<!-- Section Riwayat Pembayaran Penyewa START -->
 <hr>
<section>
  <div class="container-top">
    <p class="page-title">Riwayat Pembayaran</p>
  </div >
      
    <div class="table-riwayat">

    </div>

  
</section>
<!-- Section Riwayat Pembayaran Penyewa END -->




  </div>
</div>