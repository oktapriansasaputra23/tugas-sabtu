
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Barang</h3>
            <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary btn-sm float-right">Tambah Barang</a>
        </div>
        <div class="card-body">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                    <thead>
                        <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($barang as $b): ?>
                        <tr>
                        <td><?= $b->kode_barang ?></td>
                        <td><?= $b->nama_barang ?></td>
                        <td><?= $b->stok ?></td>
                        <td><?= $b->satuan ?></td>
                        <td>
                            <a href="<?= base_url('barang/edit/'.$b->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('barang/hapus/'.$b->id) ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
$(function() {
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
