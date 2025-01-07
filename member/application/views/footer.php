<!-- Custom JS -->
<script src="<?php echo base_url('../public/scripts/member.js') ?>"></script>

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
      "language": {
        "sLengthMenu": "Jumlah Baris _MENU_",
        "sSearch": "Cari Kontrak",
        "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ total entri)",
        "sZeroRecords": "Tidak ada data yang sesuai",
      }
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
