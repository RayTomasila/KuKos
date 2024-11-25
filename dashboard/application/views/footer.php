<!-- Login Modal Start -->
<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="post" action="<?php echo base_url("welcome") ?>">

          <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon_member" class="form-control" value="<?php echo set_value("nomor_telepon_member") ?>">
            <span class="text-danger"><?php echo form_error("nomor_telepon_member") ?></span>
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password_member" class="form-control">
            <span class="text-danger"><?php echo form_error("password_member") ?></span>
          </div>

          <button type="submit" class="btn btn-success">Login</button>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- Login Modal End -->




</body>

  <!-- Bootstrap CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <!-- Include JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

  <!-- Include select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <!-- Include select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>


  <script>new DataTable("#tabelku")</script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php if ($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
  <?php endif ?>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php if ($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
  <?php endif ?> 

  <!-- Dropdown Search -->
  <script>
    var $j = jQuery.noConflict();
    $('.searchable-dropdown').select2({
      placeholder: 'Pilih Kota/Kabupaten',
      allowClear: true,
      language: {
        noResults: function() {
            return 'Kota/Kabupaten tidak ditemukan';
        },
        inputTooShort: function() {
            return 'Cari Kota/Kabupaten'; 
        }
      }
    });
  </script>
  <!-- Dropdown Search -->

</html>