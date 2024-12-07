<div class="container mt-4">

  <div class="kontrak-container">

    <div class="container-top">
      <p class="page-title">Kontrak Penyewa</p>
      
      <a href="<?php echo base_url("kontrak/tambah/") ?>" 
      class="btn-bg-green">Tambah Kontrak</a>  
    </div>


    <table id="tabelku">
      <thead>
        <tr>
          <th>Penyewa</th>
          <th>Kamar</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Jumlah Bayar</th>
          <th>Status Bayar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kontrak as $key => $value): ?>
          <tr>
            <td style="width: 300px;"><?php echo $value['nama_penyewa'] ?></td>
            <td style="width: 150px">Kamar <?php echo $value['nomor_kamar'] ?></td>

            <td style="width: 250px">
              <?php echo date("d F Y", strtotime($value['tanggal_mulai'])) ?>
            </td>

            <td style="width: 250px">
              <?php echo date("d F Y", strtotime($value['tanggal_selesai'])) ?>
            </td>

            <td style="width: 250px">
              <?php echo number_format($value['jumlah_pembayaran'], 0, ',', '.') ?>
            </td>

            <td style="width: 200px" >
              <p class="js-card-status-pembayaran"><?php echo $value['status_pembayaran'] ?></p>
            </td>

            <td class="table-buttons">
              <a href="<?php echo base_url('ubah/'. $value['id_kontrak']) ?>">
                  <button class="btn btn-primary">Ubah</button>
              </a>
              <a href="<?php echo base_url('hapus/'. $value['id_kontrak']) ?>">
                  <button class="btn btn-danger">Hapus</button>
              </a>
              
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="pembayaran-container">
    <div class="container-top">
      <p class="page-title">Pembayaran Penyewa</p>
      
      <a href="<?php echo base_url("kontrak/tambah/") ?>" 
      class="btn-bg-green">Tambah Pembayaran</a>  
    </div>
  </div>
  
</div>