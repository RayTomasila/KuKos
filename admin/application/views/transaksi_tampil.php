<div class="container px-5 mt-5 table-transaksi">
    <h5>Data transaksi</h5>
    <table class="table table-hover" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>kode_transaksi</th>
                <th>nama_member</th>
                <th>jumlah_transaksi</th>
                <th>tanggal_transaksi</th>
                <th>status_transaksi</th>
                <th>status_langganan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['kode_transaksi']?></td>
                <td><?php echo $value['nama_lengkap_member']?></td>
                <td><?php echo number_format($value['jumlah_transaksi'])?></td>
                <td><?php echo date($value['tanggal_transaksi'])?></td>
                <td><?php echo $value['status_transaksi']?></td>
                <td><?php echo $value['status_langganan']?></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>