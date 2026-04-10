  </div> <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>&copy; <?= date('Y') ?> Admin Panel.</strong>
    All rights reserved.
  </footer>
</div> <!-- ./wrapper -->

<!-- Scripts -->


<!-- jQuery (wajib) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        lengthChange: true,
        pageLength: 10
    });
});
</script>

</body>
</html>