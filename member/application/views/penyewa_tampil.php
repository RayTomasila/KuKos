<div class="container container-penyewa">

  <div class="container-top">
    <h5>Daftar Penyewa</h5>

    <div>
      <input type="text" placeholder="Cari Penyewa">
    </div>

    <div>
      <a href="<?php echo base_url("penyewa/tambah/")?>" class="btn btn-success">Tambah Penyewa</a>
    </div>

  </div>
  
  <div class="card-container">
      <?php foreach ($penyewa['pkk'] as $key => $value): ?>
   
        <a href="<?php echo base_url("penyewa/detail/".$value["id_penyewa"]) ?>" class="text-decoration-none text-dark">
          
            <div class="card-content">            
              <p><?php echo $value['nama_penyewa'] ?></p>

              <p href="https://wa.me/<?php echo $value['nomor_telepon'] ?>" target="_blank"><?php echo $value['nomor_telepon'] ?></p>

              <p>Kamar <?php echo $value['nomor_kamar'] ?></p>
              <p>Sejak <?php echo $value['tanggal_mulai'] ?></p>

            </div> 
        </a>
               
      <?php endforeach ?>    
    </div>

    <pre>
      <?php print_r($penyewa['pkk']); ?>
    </pre>
</div>