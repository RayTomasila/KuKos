<div class="container">

  <div class="container-top">
    <p class="page-title">Informasi Penyewa</p>
    
    <?php foreach ($penyewa as $key => $value): ?>
    
    <a href="<?php echo base_url("penyewa/hapus/". $value['id_penyewa'])?>" class="btn-bg-red"> Hapus Penyewa</a>  
  </div>

  <!-- form Ubah Data Penyewa START -->
  <section>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama_penyewa" value="<?php echo $value['nama_penyewa'] ?>" class="form-control">
      </div>

      <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="<?php echo $value['nomor_telepon'] ?>" class="form-control">
      </div>

      <div class="mb-3">
          <label>Berkas</label><br>
          <img src="<?php echo $this->config->item("url_penyewa"). $value['foto_ktp'] ?>" width="500"> 
        </div>
        
        <div class="mb-3">
          <label>Ganti Foto Berkas</label>
          <input type="file" name="foto_ktp" class="form-control w-25">
        </div>

      <button type="submit" class="btn-bg-blue mt-3">Ubah Data Penyewa</button>
      
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