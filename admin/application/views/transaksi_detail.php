<div class="container">
    <div class="row mb-5">

        <div class="col-md-3"> 
            <h5>Transaksi</h5>
            <p>ID: <?php echo isset($transaksi['id_transaksi']) ? $transaksi['id_transaksi'] : ''; ?></p>
            <p>Tanggal: <?php echo isset($transaksi['tanggal_transaksi']) ? date('d M Y H:i', strtotime($transaksi['tanggal_transaksi'])) : ''; ?></p>
            <span class="badge bg-primary"><?php echo isset($transaksi['status_transaksi']) ? $transaksi['status_transaksi'] : ''; ?></span>
        </div>

        <div class="col-md-3">
            <h5>Pengirim</h5>
            <p><?php echo isset($transaksi['nama_pengirim']) ? $transaksi['nama_pengirim'] : ''; ?>, <?php echo isset($transaksi['wa_pengirim']) ? $transaksi['wa_pengirim'] : ''; ?></p>
            <p><?php echo isset($transaksi['alamat_pengirim']) ? $transaksi['alamat_pengirim'] : ''; ?>, <?php echo isset($transaksi['distrik_pengirim']) ? $transaksi['distrik_pengirim'] : ''; ?></p>
        </div>

        <div class="col-md-3">
            <h5>Penerima</h5>
            <p><?php echo isset($transaksi['nama_penerima']) ? $transaksi['nama_penerima'] : ''; ?>, <?php echo isset($transaksi['wa_penerima']) ? $transaksi['wa_penerima'] : ''; ?></p>
            <p><?php echo isset($transaksi['alamat_penerima']) ? $transaksi['alamat_penerima'] : ''; ?>, <?php echo isset($transaksi['distrik_penerima']) ? $transaksi['distrik_penerima'] : ''; ?></p>
        </div>

        <div class="col-md-3">
            <h5>Ekspedisi</h5>
            <p><?php echo isset($transaksi['nama_ekspedisi']) ? $transaksi['nama_ekspedisi'] : ''; ?>, <?php echo isset($transaksi['layanan_ekspedisi']) ? $transaksi['layanan_ekspedisi'] : ''; ?></p>
            <p><?php echo isset($transaksi['estimasi_ekspedisi']) ? $transaksi['estimasi_ekspedisi'] : ''; ?>, <?php echo isset($transaksi['berat_ekspedisi']) ? $transaksi['berat_ekspedisi'] : ''; ?></p>
        </div>
    </div>

    <h5>Produk</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($transaksi_detail as $key => $value): ?>

            <tr>
                <td><?php echo isset($value["nama_beli"]) ? $value["nama_beli"] : ''; ?></td>
                <td><?php echo isset($value["harga_beli"]) ? number_format($value["harga_beli"]) : ''; ?></td>
                <td><?php echo isset($value["jumlah_beli"]) ? number_format($value["jumlah_beli"]) : ''; ?></td>
                <td><?php echo isset($value["harga_beli"]) && isset($value["jumlah_beli"]) ? number_format($value["harga_beli"] * $value["jumlah_beli"]) : ''; ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Belanja</td>
                <th><?php echo isset($transaksi["belanja_transaksi"]) ? number_format($transaksi["belanja_transaksi"]) : ''; ?></th>
            </tr>
            <tr>
                <td colspan="3">Ongkos Kirim</td>
                <th><?php echo isset($transaksi["ongkir_transaksi"]) ? number_format($transaksi["ongkir_transaksi"]) : ''; ?></th>
            </tr>
            <tr>
                <td colspan="3">Total Harus Dibayar</td>
                <th><?php echo isset($transaksi["total_transaksi"]) ? number_format($transaksi["total_transaksi"]) : ''; ?></th>
            </tr>
        </tfoot>
    </table>
</div>
