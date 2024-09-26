<div class="container">
    <h5>Tambah Artikel</h5>

    <form method="post" enctype="multipart/form-data">
      
        <div class="mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul_artikel" class="form-control" >
            <span class="small text-danger">
                <?php echo form_error("judul_artikel") ?>
            </span>
        </div>

        <div class="mb-3">
            <label>Isi artikel</label>
            <textarea name="isi_artikel" class="form-control" id="textedit" ></textarea>

            <span class="small text-danger">
                <?php echo form_error("isi_artikel") ?>
            </span>
        </div>
        
        <div class="mb-3">
            <label>Foto artikel</label>
            <input type="file" name="foto_artikel" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>