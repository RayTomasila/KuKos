<div class="container px-5 mt-5 table-transaksi">
    <h2 class="mb-3">Daftar Transaksi</h2>
    <table class="table table-hover" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Nama Member</th>
                <th>Jumlah Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Status Transaksi</th>
                <th>Status Langganan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['kode_transaksi']?></td>
                <td><?php echo $value['nama_lengkap_member']?></td>
                <td><?php echo number_format($value['jumlah_transaksi'])?></td>
                <td><?php echo formatDateIndonesian($value['tanggal_transaksi'])?></td>
                <td><?php echo $value['status_transaksi']?></td>
                <td><?php echo $value['status_langganan']?></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>