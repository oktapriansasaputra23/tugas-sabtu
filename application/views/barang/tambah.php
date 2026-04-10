
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-container .select2-selection--single {
        height: 38px !important;
        padding: 5px !important;
    }
</style>

<div class="content-header">
    <h4>Tambah Barang</h4>
</div>

<section class="content">
<div class="card">
    <div class="card-body">

        <form action="<?= site_url('barang/tambah') ?>" method="post">

            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="kode" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <select name="satuan" class="form-control" required>
                    <option value="">-- Pilih Satuan --</option>
                    <option value="PCS">PCS</option>
                    <option value="BOX">BOX</option>
                    <option value="KG">KG</option>
                    <option value="L">L</option>
                    <option value="PACK">PACK</option>
                    <option value="UNIT">UNIT</option>
                </select>
            </div>


            <div class="form-group">
                <label>Stok Awal</label>
                <input type="number" name="stok" class="form-control" value="0" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('barang') ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>
</section>
