<div class="container">
        <h5>Data Slider</h5>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Caption</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($slider as $key => $value): ?>
        
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['caption_slider']; ?></td>
                    <td> <img src="<?php echo $this->config->item("url_slider"). $value["foto_slider"] ?>" width="200"> </td>

                    <td>
                        <a href="<?php echo base_url("slider/edit/" .$value["id_slider"]) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url("slider/hapus/".$value["id_slider"])?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    <a href="<?php echo base_url("slider/tambah")?>" class="btn btn-primary">Tambah Slider</a>
</div>