<div class="container mt-3">

  <div class="container-top">
    <h5>Daftar Penyewa</h5>

    <div>
      <input type="text" placeholder="Cari Penyewa">
    </div>

    <div>
      <a href="<?php echo base_url("penyewa/tambah/")?>" class="btn btn-success">Tambah Penyewa</a>
    </div>

  </div>
    
    <div class="row">        
        <?php foreach ($penyewa as $key => $value): ?>
            <div class="col-md-3">
                <a href="<?php echo base_url("penyewa/detail/".$value["id_penyewa"]) ?>" class="text-decoration-none text-dark">
                
                    <div class="card-border-0 shadow">
                        
                        <div class="card-body text-center">
                            <h6><?php echo $value['nama_penyewa'] ?></h6>
                        </div>   

                    </div>    
                </a>
            </div>                  
        <?php endforeach ?>
        
    </div>
</div>