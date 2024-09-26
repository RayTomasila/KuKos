<div class="container">
        <h5>Data Artikel</h5>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artikel as $key => $value): ?>
        
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['judul_artikel']; ?></td>
                    <td> <img src="<?php echo $this->config->item("url_artikel"). $value["foto_artikel"] ?>" width="200"> </td>

                    <td>
                        <a href="<?php echo base_url("artikel/edit/" .$value["id_artikel"]) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url("artikel/hapus/".$value["id_artikel"])?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    <a href="<?php echo base_url("artikel/tambah")?>" class="btn btn-primary">Tambah Artikel</a>
</div>