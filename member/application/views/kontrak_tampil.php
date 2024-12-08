<div class="container my-4">

  <div class="kontrak-container">

    <div class="container-top">
      <p class="page-title">Kontrak Penyewa</p>
      
      <a href="<?php echo base_url("kontrak/tambah/") ?>" 
      class="btn-bg-green">Tambah Kontrak</a>  
    </div>

    <div class="table-container">
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
              <?php $value['id_kontrak'] ?>
              <td ><?php echo $value['nama_penyewa'] ?></td>
              <td >Kamar <?php echo $value['nomor_kamar'] ?></td>

              <td >
                <?php echo date("d F Y", strtotime($value['tanggal_mulai'])) ?>
              </td>

              <td >
                <?php echo date("d F Y", strtotime($value['tanggal_selesai'])) ?>
              </td>

              <td >
                <?php echo number_format($value['jumlah_pembayaran'], 0, ',', '.') ?>
              </td>

              <td >
                <p class="js-card-status-pembayaran"><?php echo $value['status_pembayaran'] ?></p>
              </td>

              <td class="table-buttons">
                <a href="<?php echo base_url('kontrak/ubah/'. $value['id_kontrak']) ?>">
                    <img src="../public/assets/member/kontrak/ubah.png" alt="foto ubah kontrak">
                </a>
                <a href="<?php echo base_url('kontrak/hapus/'. $value['id_kontrak']) ?>">
                    <img src="../public/assets/member/kontrak/hapus.png" alt="foto hapus kontrak">
                </a>                
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
