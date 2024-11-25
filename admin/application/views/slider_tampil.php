<div class="container mt-4">
    <h5 class="mb-3">Data Slider</h5>
    <table class="table table-striped table-bordered" id="tabelku">
        <thead class="thead-dark">
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
                    <td><?php echo htmlspecialchars($value['caption_slider']); ?></td>
                    <td>
                        <img src="<?php echo $this->config->item('url_slider') . $value['foto_slider']; ?>" 
                             alt="Slider Image" width="200" class="img-fluid">
                    </td>
                    <td>
                        <a href="<?php echo base_url('slider/edit/' . $value['id_slider']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo base_url('slider/hapus/' . $value['id_slider']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('slider/tambah'); ?>" class="btn btn-sm" style="background-color: #93d56b; border-color: #93d56b; color: white;">Tambah Slider</a>
</div>
