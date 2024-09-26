<div class="container">
    <h5>Edit artikel</h5>

    <form method="post" enctype="multipart/form-data">

         <div class="mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul_artikel" class="form-control" value="<?php echo $artikel['judul_artikel']?>">
            <span class="small text-danger">
                <?php echo form_error("judul_artikel") ?>
            </span>
        </div>

        <div class="mb-3">
            <label>Isi artikel</label>
            <textarea name="isi_artikel" class="form-control" id="textedit" ><?php echo $artikel['isi_artikel'] ?></textarea>

            <span class="small text-danger">
                <?php echo form_error("isi_artikel") ?>
            </span>
        </div>

        <div class="mb-3">
            <label>Foto Lama</label><br>
            <img src="<?php echo $this->config->item("url_artikel"). $artikel["foto_artikel"]?>" width="100">
        </div>
        
        <div class="mb-3">
            <label>Ganti Foto artikel</label>
            <input type="file" name="foto_artikel" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
