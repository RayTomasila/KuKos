<div class="container container-custom">
  <div class="container-top">
    <div class="container-top-left">
      <div class="back-button">
        <a href="<?php echo base_url("kamar")?>"> 
          <img src="<?php echo base_url('../public/assets/member/dashboard/arrow-left.svg" alt="arrow back')?>"> 
        </a> 
      </div>
      <p class="page-title">Tambah Kamar</p>
    </div>
  </div>

  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <?php echo form_open_multipart('kamar/tambah'); ?>


  <div class="checkbox-tambah-fasilitas">
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="batch_kamar" name="batch_kamar">
      <label class="form-check-label mb-2" for="batch_kamar">Tambah Kamar Sekaligus</label>
    </div>

    <div id="jumlah_kamar_batch" style="display:none;" class="form-group">
      <select name="jumlah_kamar" id="jumlah_kamar" class="form-control form-select">
          <?php for ($i=1; $i <= 20; $i++): ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?> Kamar</option>
          <?php endfor; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="status_kamar">Status Kamar</label>
    <select class="form-control form-select" name="status_kamar">
      <option value="siap huni">Siap Huni</option>
      <option value="digunakan">Digunakan</option>
      <option value="tidak aktif">Tidak Aktif</option>
    </select>
  </div>

  <div class="form-group">
    <label for="harga_kamar">Harga Kamar</label>
    <input type="number" class="form-control" name="harga_kamar" placeholder="Masukan Harga Kamar"  value="<?php echo set_value('harga_kamar'); ?>">
  </div>

  <div class="checkbox-tambah-fasilitas">
    <?php foreach ($fasilitas as $f): ?>
      <div class="form-check">
        <input 
        type="checkbox" 
        class="form-check-input" 
        name="id_fasilitas[]" 
        value="<?php echo $f['id_fasilitas']; ?>" 
        <?php if (isset($kamar->fasilitas_ids) && in_array($f['id_fasilitas'], explode(',', $kamar->fasilitas_ids))) echo 'checked'; ?>
        >
        <label class="form-check-label"><?php echo $f['nama_fasilitas']; ?></label>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="form-group py-2">
    <label for="foto_kamar">Foto Kamar</label>
    <input type="file" class="form-control" name="foto_kamar" id="foto-to-display" onchange="previewImage()">
  </div>

  
  <div class="display-uploaded-foto">
    <img id="image-preview" src="" alt="Uploaded Image"/>
  </div>

  <button type="submit" class="btn btn--green mt-3">Simpan</button>
  <?php echo form_close(); ?>
</div>

<script>
  document.getElementById('batch_kamar').addEventListener('change', function() {
    const batchKamar = document.getElementById('batch_kamar');
    const jumlahKamarBatch = document.getElementById('jumlah_kamar_batch');

    if (batchKamar.checked) {
      jumlahKamarBatch.style.display = 'block';
    } else {
      jumlahKamarBatch.style.display = 'none'; 
    }
  });
</script>
