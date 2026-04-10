
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Transaksi</h3>
            <a href="<?= base_url('transaksi/tambah'); ?>" class="btn btn-primary btn-sm float-right">Tambah Barang</a>
        </div>
        <div class="card-body">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($transaksi as $t): ?>
                        <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y', strtotime($t->tanggal)) ?></td>
                        <td><?= $t->kode_barang ?></td>
                        <td><?= $t->nama_barang ?></td>
                        <td><?= $t->jumlah ?></td>
                        <td><?= ucfirst($t->jenis) ?></td>
                        <td>
                            <a href="<?= base_url('transaksi/edit/'.$t->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('transaksi/hapus/'.$t->id) ?>" class="btn btn-danger btn-sm">Hapus</a>
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
