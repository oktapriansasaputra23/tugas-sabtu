
<div class="content-header">
    <h4>Edit Barang</h4>
</div>
<!-- <?= '<pre>'; print_r($barang); echo '</pre>'; ?> -->

<section class="content">
<div class="card">
    <div class="card-body">

        <form action="<?= site_url('barang/edit/' . $barang->id) ?>" method="post">

            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="kode" class="form-control" 
                       value="<?= $barang->kode_barang ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" 
                       value="<?= $barang->nama_barang ?>" required>
            </div>

           <div class="form-group">
                <label>Satuan</label>
                <select name="satuan" class="form-control" required>
                    <option value="">-- Pilih Satuan --</option>
                    <option value="PCS"  <?= $barang->satuan == 'PCS' ? 'selected' : '' ?>>PCS</option>
                    <option value="BOX"  <?= $barang->satuan == 'BOX' ? 'selected' : '' ?>>BOX</option>
                    <option value="KG"   <?= $barang->satuan == 'KG' ? 'selected' : '' ?>>KG</option>
                    <option value="L"    <?= $barang->satuan == 'L' ? 'selected' : '' ?>>L</option>
                    <option value="PACK" <?= $barang->satuan == 'PACK' ? 'selected' : '' ?>>PACK</option>
                    <option value="UNIT" <?= $barang->satuan == 'UNIT' ? 'selected' : '' ?>>UNIT</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('barang') ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>
</section>
