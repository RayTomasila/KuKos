<div class="container mt-4">
  
  <div class="container-top">
    <p class="page-title">Kontrak Penyewa</p>
    
    <a href="<?php echo base_url("kontrak/tambah/") ?>" 
    class="btn-bg-green">Tambah Kontrak</a>  
  </div>


	<table>
		<thead>
			<tr>
				<th>Nomor Kontrak</th>
				<th>Nama Penyewa</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Keluar</th>
				<th>Jumlah pembayaran</th>
				<th>Status pembayaran</th>
				<th>Metode pembayaran</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach ($kontrak as $key => $value): ?>
        <tr>
          <td style="width: 5px">
              <?php echo $key+=1 ?>
          </td>
          <td style="width: 300px"><?php echo $value['nama_penyewa'] ?></td>

          <td style="width: 300px">
            <?php echo date("d F Y", strtotime($value['tanggal_mulai'])) ?>
          </td>

          <td style="width: 300px">
            <?php echo date("d F Y", strtotime($value['tanggal_selesai'])) ?>
          </td>

          <td style="width: 200px">
            <?php echo number_format($value['jumlah_pembayaran'],0, ',', '.') ?>
          </td>

          <td style="width: 200px" >
            <p class="js-card-status-pembayaran"><?php echo $value['status_pembayaran'] ?></p>
          </td>

          <td style="width: 200px"><?php echo $value['metode_pembayaran'] ?></td>

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