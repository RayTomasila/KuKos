
<footer class="bg-light text-center py-3 mt-2">
    <div class="">copyright &copy; 2024. KuKos</div>
</footer>

  <!-- own JS -->
  <script src="../public/scripts/member.js"></script>
  <!-- own JS -->


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

</html>