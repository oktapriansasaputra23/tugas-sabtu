
<link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<?php //print_r($penilaian)?>     
<section class="content">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalNilai">
                Tambah Penilaian
            </button>

            <button id="btnExport" class="btn btn-success">Export Excel</button>


        </div>

        <div class="card-body">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Absen</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($penilaian as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nim ?></td>
                        <td><?= $p->nama_mahasiswa ?></td>
                        <td><?= $p->jurusan ?></td>
                        <td><?= $p->absen ?></td>
                        <td><?= $p->tugas ?></td>
                        <td><?= $p->uts ?></td>
                        <td><?= $p->uas ?></td>
                        <td><?= number_format($p->nilai_akhir,2) ?></td>
                        <td><strong><?= $p->grade ?></strong></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="modalNilai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="<?= base_url('penilaian/simpan') ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Form Penilaian Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body row">

                    <div class="col-md-12 mb-2">
                        <label>Mahasiswa</label>
                        <select name="id_mahasiswa" class="form-control" required>
                            <option value="">-- pilih --</option>
                            <?php foreach($mahasiswa as $m): ?>
                                <option value="<?= $m->id ?>"><?= $m->nama_mahasiswa ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label>Absen (10%)</label>
                        <input type="number" id="absen" name="absen" class="form-control nilai" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label>Tugas (20%)</label>
                        <input type="number" id="tugas" name="tugas" class="form-control nilai" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label>UTS (30%)</label>
                        <input type="number" id="uts" name="uts" class="form-control nilai" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label>UAS (40%)</label>
                        <input type="number" id="uas" name="uas" class="form-control nilai" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Nilai Akhir</label>
                        <input type="text" id="nilai_akhir" class="form-control bg-light" readonly>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<script>
document.addEventListener('input', function(e) {

    if (e.target.id === 'absen' ||
        e.target.id === 'tugas' ||
        e.target.id === 'uts' ||
        e.target.id === 'uas') {

        let absen = parseFloat(document.getElementById('absen').value) || 0;
        let tugas = parseFloat(document.getElementById('tugas').value) || 0;
        let uts   = parseFloat(document.getElementById('uts').value) || 0;
        let uas   = parseFloat(document.getElementById('uas').value) || 0;

        let hasil = (absen * 0.10) +
                    (tugas * 0.20) +
                    (uts   * 0.30) +
                    (uas   * 0.40);

        document.getElementById('nilai_akhir').value = hasil.toFixed(2);
    }

});
</script>
<script>
document.getElementById('btnExport').addEventListener('click', function () {

    var table = document.getElementById("dataTable");

    var wb = XLSX.utils.table_to_book(table, {sheet: "Penilaian"});
    XLSX.writeFile(wb, "Data_Penilaian.xlsx");

});
</script>

