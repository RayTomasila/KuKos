<div class="container dashboard-custom">

  <div class="container-top">
    <p class="page-title">Kontrak Penyewa</p>

    <a href="<?php echo base_url("kontrak/tambah/") ?>"
      class="btn btn--green ">Tambah Kontrak</a>
  </div>

  <div style="overflow-x: auto;" class="table-responsive">
    <table id="tabelku" class="table table-hover">
      <thead>
        <tr>
          <th>Penyewa</th>
          <th>Kamar</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Lama Kontrak</th>
          <th>Total Bayar</th>
          <th>Status Bayar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kontrak as $key => $value): ?>
          <tr>
            <?php $value['id_kontrak'] ?>
            <td><?php echo $value['nama_penyewa'] ?></td>
            <td><?php echo $value['nomor_kamar'] ?></td>

            <td>
              <?php echo formatDateIndonesian($value['tanggal_mulai']); ?>
            </td>
            <td>
              <?php echo formatDateIndonesian($value['tanggal_selesai']); ?>
            </td>

            <td>
              <?php
              $tanggal_mulai = new DateTime($value['tanggal_mulai']);
              $tanggal_selesai = new DateTime($value['tanggal_selesai']);

              $interval = $tanggal_mulai->diff($tanggal_selesai);

              $lama_kontrak = $interval->y * 12 + $interval->m + ($interval->d > 0 ? 1 : 0);

              echo $lama_kontrak . " bulan";
              ?>
            </td>

            <td>
              <?php
              $value['jumlah_pembayaran'] = $value['harga_kamar'] * $lama_kontrak;
              echo number_format($value['jumlah_pembayaran'], 0, ',', '.')
              ?>
            </td>

            <td>
              <p class="js-card-status-pembayaran"><?php echo $value['status_pembayaran'] ?></p>
            </td>

            <td class="table-buttons">
              <a href="<?php echo base_url('kontrak/ubah/' . $value['id_kontrak']) ?>">
                <img src="../public/assets/member/kontrak/ubah.png" alt="foto ubah kontrak">
              </a>
              <a href="<?php echo base_url('kontrak/hapus/' . $value['id_kontrak']) ?>">
                <img src="../public/assets/member/kontrak/hapus.png" alt="foto hapus kontrak">
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>