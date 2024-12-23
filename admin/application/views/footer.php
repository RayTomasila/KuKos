
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

    <script>
      $(document).ready(function() {
        $('#tabelku').DataTable({
          "order": [[0, 'asc']],
          "paging": true,
          "searching": true,
          "pageLength": 5, 
          "lengthMenu": [5, 10, 25],
          "responsive": true,
        });
      });
    </script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if ($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
    <?php endif ?>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace("textedit")</script>

  </body>
</html>