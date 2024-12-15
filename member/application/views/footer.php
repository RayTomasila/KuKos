<footer class="bg-light text-center py-3">
    <div>copyright &copy; 2024. KuKos</div>
</footer>

<!-- Custom JS -->
<script src="../public/scripts/member.js"></script>



<!-- DataTable Initialization -->
<script>
  $(document).ready(function() {
    $('#tabelku').DataTable({
      "order": [[0, 'desc']],
      "paging": true,
      "searching": true,
      "pageLength": 5, 
      "lengthMenu": [5, 10, 25],
      "responsive": true,
    });
  });
</script>

<!-- SweetAlert JS (Only once) -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if ($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
<?php endif ?>

<?php if ($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
<?php endif ?>
</html>
