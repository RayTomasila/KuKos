<!-- Custom JS -->
  <script src="<?php echo base_url('../public/scripts/member.js') ?>"></script>

<!-- DataTable Initialization -->
<script>
  $(document).ready(function () {
    $('#tabelku').DataTable({
      "order": [[0, 'desc']],
      "paging": true,
      "searching": true,
      "pageLength": 5,
      "lengthMenu": [5, 10, 25],
      "responsive": true,
      "language": {
        "sLengthMenu": "Jumlah Baris _MENU_",
        "sInfo": "",
        "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ total entri)",
        "sZeroRecords": "Tidak ada data yang sesuai"
      },
      initComplete: function () {
        const searchInput = $('.dt-search input');
        searchInput.attr('placeholder', 'Cari Kontrak...');
        searchInput.removeAttr('aria-label');
      }
    });
  });
</script>



<!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Swal -->
  <?php if ($this->session->flashdata('pesan_sukses')): ?>
      <script>
          Swal.fire({
              title: "Sukses!",
              text: "<?php echo $this->session->flashdata('pesan_sukses'); ?>",
              icon: "success"
          });
      </script>
  <?php endif ?>

  <?php if ($this->session->flashdata('pesan_gagal')): ?>
      <script>
          Swal.fire({
              title: "Gagal!",
              text: "<?php echo $this->session->flashdata('pesan_gagal'); ?>",
              icon: "error"
          });
      </script>
  <?php endif ?>


<!-- FlatPicker Date Format -->
  <script>
      flatpickr("#tanggal_mulai", {
      dateFormat: "d/m/Y", 
    });

    flatpickr("#tanggal_selesai", {
      dateFormat: "d/m/Y",
    });
  </script>

</html>
