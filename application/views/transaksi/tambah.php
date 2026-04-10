<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Tambah Transaksi</h3>
            </div>

            <div class="card-body">
                <form action="<?= base_url('transaksi/tambah'); ?>" method="POST">

                    <div class="form-group">
                        <label>Barang</label>
                        <select name="id_barang" class="form-control select2" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php foreach ($barang as $b): ?>
                                <option value="<?= $b->id; ?>">
                                    <?= $b->kode_barang . " - " . $b->nama_barang; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" min="1" name="jumlah" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Transaksi</label>
                        <select name="jenis" class="form-control" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="masuk">Barang Masuk</option>
                            <option value="keluar">Barang Keluar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

    </div>
</section>

<!-- Select2 Script -->
<script>
$(document).ready(function() {
    $('.select2').select2({
        width: '100%'
    });
});
</script>
