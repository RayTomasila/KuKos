<div class="container">
    <h5>Data transaksi</h5>
    <table class="table table-bordered" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['tanggal_transaksi']?></td>
                <td><?php echo number_format($value['total_transaksi'])?></td>
                <td><?php echo $value['status_transaksi']?></td>
                <td>
                    <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"])?>" class="btn btn-info">Detail</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>