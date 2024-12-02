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
        <label>Kamar</label>
        <select class="form-control form-select" name="id_kamar">
          <option value=""><?php echo $value['nomor_kamar'] ?></option>

          <?php foreach ($kamar as $k => $v) : ?>              
            <option value="<?php echo $v['id_kamar'] ?>"
              <?php echo $v['id_kamar'] == $kamar['id_kamar'] ? "selected" : "" ?>>
              <?php echo $v['nomor_kamar'] ?>
            </option>              
          <?php endforeach ?>
            
        </select>
      </div>
      
      <div class="mb-3">
          <label>Berkas</label><br>
          <img src="<?php echo $this->config->item("url_penyewa"). $value['foto_ktp'] ?>" width="500"> 
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
  </div>

  </div>
  
</section>
<!-- Section Riwayat Pembayaran Penyewa END -->




  </div>


</div>