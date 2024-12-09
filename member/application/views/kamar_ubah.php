<div class="container my-4">
    <h2>Edit Data Kamar</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open_multipart('kamar/ubah/' . $kamar->id_kamar); ?>

    <div class="form-group">
        <label for="nomor_kamar">Nomor Kamar</label>
        <input type="text" class="form-control" name="nomor_kamar" value="<?php echo set_value('nomor_kamar', $kamar->nomor_kamar); ?>">
    </div>

    <div class="form-group">
        <label for="status_kamar">Status Kamar</label>
        <select class="form-control" name="status_kamar">
            <option value="siap huni" <?php echo $kamar->status_kamar == 'siap huni' ? 'selected' : ''; ?>>Siap Huni</option>
            <option value="digunakan" <?php echo $kamar->status_kamar == 'digunakan' ? 'selected' : ''; ?>>Digunakan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="harga_kamar">Harga Kamar</label>
        <input type="text" class="form-control" name="harga_kamar" value="<?php echo set_value('harga_kamar', $kamar->harga_kamar); ?>">
    </div>

    <div class="form-group">
        <label for="id_fasilitas">ID Fasilitas</label>
        <input type="text" class="form-control" name="id_fasilitas" value="<?php echo set_value('id_fasilitas', $kamar->id_fasilitas); ?>">
    </div>

    <div class="form-group">
        <label for="foto_kamar">Foto Kamar</label><br>
        <?php if ($kamar->foto_kamar): ?>
            <img src="<?php echo base_url('uploads/kamar/' . $kamar->foto_kamar); ?>" alt="Foto Kamar" class="img-thumbnail mb-2" width="200">
        <?php endif; ?>
        <input type="file" class="form-control" name="foto_kamar">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?php echo form_close(); ?>
</div>
