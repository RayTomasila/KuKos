<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("penyewa") ?>">
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back') ?>">
        </a>
      </div>
      <p class="page-title">Informasi Penyewa</p>
    </div>

    <?php if (isset($penyewa) && count($penyewa) > 0): ?>
      <?php $value = $penyewa[0]; ?>
      <a href="#" class="btn btn--red btn-hapus-top btn-hapus" data-href="<?php echo site_url("penyewa/hapus/" . $value['penyewa_id']); ?>">Hapus Penyewa</a>
    <?php endif; ?>

  </div>

  <!-- form Ubah Data Penyewa START -->
  <section>
    <form method="post" enctype="multipart/form-data">
      <?php if (isset($penyewa) && count($penyewa) > 0): ?>
        <?php $value = $penyewa[0]; ?>
        <div class="form-group mb-3">
          <label>Nama</label>
          <input type="text" name="nama_penyewa" value="<?php echo $value['nama_penyewa'] ?>" class="form-control">
        </div>
        <div class="form-group mb-3">
          <label>Nomor Telepon</label>
          <input type="text" name="nomor_telepon" value="<?php echo $value['nomor_telepon'] ?>" class="form-control">
        </div>

        <!-- Foto Berkas KTP -->
        <div class="ktp-dropdown mb-3">
          <input type="checkbox" id="foto-toggle">
          <label for="foto-toggle" class="dropdown-label">
            Berkas
            <span class="arrow"></span>
          </label>
          <div class="foto-dropdown-content mb-5">
            <img src="<?php echo $this->config->item('url_penyewa') . $value['foto_ktp']; ?>" alt="Tidak Ada Berkas">
          </div>
        </div>

        <!-- Ganti Foto Berkas -->
        <div class="form-textarea form-group py-2">
          <label class="mb-2">Ganti Foto Berkas</label>
          <input type="file" name="foto_ktp" class="form-control " id="foto-to-display" onchange="previewImage()">
        </div>

        <div class="display-uploaded-foto">
          <img id="image-preview" src="" />
        </div>

        <div class="button-ubah-hapus">
          <button type="submit" class="btn btn--green">Simpan</button>
          <a href="<?php echo base_url("penyewa/hapus/" . $value['id_penyewa']); ?>" class="btn btn--red btn-hapus btn-hapus-bottom">Hapus</a>
        </div>
      <?php endif; ?>
    </form>

  </section>
  <!-- form Ubah Data Penyewa END -->


 <!-- Riwayat Pembayaran START -->
<section>
  <div class="container-top-pembayaran mt-5">
    <p class="page-title">Riwayat Pembayaran</p>
  </div>
  <div class="table-riwayat">
    <div style="overflow-x: auto;" class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <td>Kamar</td>
            <td>Tanggal Masuk</td>
            <td>Tanggal Keluar</td>
            <td>Lama Kontrak</td>
            <td>Jumlah Bayar</td>
            <td>Status Bayar</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($penyewa as $data): ?>
            <?php if (!empty($data['id_kontrak'])): ?>
              <tr>
                <td><?php echo $data['nomor_kamar'] ?></td>
                <td><?php echo formatDateIndonesian($data['tanggal_mulai']); ?></td>
                <td><?php echo formatDateIndonesian($data['tanggal_selesai']); ?></td>
                <td>
                  <?php
                  $tanggal_mulai = new DateTime($data['tanggal_mulai']);
                  $tanggal_selesai = new DateTime($data['tanggal_selesai']);
                  $interval = $tanggal_mulai->diff($tanggal_selesai);
                  $lama_kontrak = $interval->y * 12 + $interval->m + ($interval->d > 0 ? 1 : 0);
                  echo $lama_kontrak . " bulan";
                  ?>
                </td>
                <td><?php echo number_format($data['harga_kamar'] * $lama_kontrak, 0, ',', '.'); ?></td>
                <td>
                  <p class="js-card-status-pembayaran"><?php echo $data['status_pembayaran'] ?></p>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- Riwayat Pembayaran END -->


</div>