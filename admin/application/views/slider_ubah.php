<div class="container">
    <h5>Slider Ubah</h5>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>caption slider</label>
            <textarea name="caption_slider" class="form-control" id="textedit">
              <?php echo $slider['caption_slider'] ?></textarea>
            
            <span class="small text-danger">
                <?php echo form_error("caption_slider") ?>
            </span>
        </div>

        <div class="mb-3">
            <label>Foto Lama</label><br>
            <img src="<?php echo $this->config->item("url_slider"). $slider["foto_slider"]?>" width="100">
        </div>
        
        <div class="mb-3">
            <label>Ganti Foto slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>