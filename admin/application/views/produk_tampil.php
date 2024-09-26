<div class="container">
    <h5>Data Produk</h5>
    <div class="table-responsive">
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($produk as $key => $value): ?>
                    
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value['nama_produk']; ?></td>
                    <td><?php echo number_format($value['harga_produk']) ?></td>
                    <td><?php echo $value['foto_produk']; ?></td>
                    <td>
                        <a href="" class="btn btn-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach?>
        
            </tbody>
        </table>
    </div>
</div>
