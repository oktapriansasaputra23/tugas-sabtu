
<section class="content">
    <div class="card">
        <div class="card-header">
            <!-- <h3 class="card-title">Data Mahasiswa</h3> -->

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah Mahasiswa
            </button>

            <button class="btn btn-success" data-toggle="modal" data-target="#modalImport">
Import Excel
</button>
        </div>
        <div class="card-body">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($mahasiswa as $m): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $m->nim ?></td>
                    <td><?= $m->nama_mahasiswa ?></td>
                    <td><?= $m->jurusan ?></td>
                    <td><?= $m->matakuliah ?></td>
                    <td><?= $m->kelas ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="editMahasiswa('<?= $m->id ?>','<?= $m->nim ?>','<?= $m->nama_mahasiswa ?>','<?= $m->jurusan ?>','<?= $m->matakuliah ?>','<?= $m->kelas ?>')">
                            Edit
                        </button>
                        <a href="<?= base_url('mahasiswa/delete/'.$m->id) ?>"
                        onclick="return confirm('Hapus data?')"
                        class="btn btn-danger btn-sm">
                        Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?= base_url('mahasiswa/simpan') ?>">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Mahasiswa</h5>
        </div>
        <div class="modal-body">
            <input type="text" name="nim" class="form-control mb-2" placeholder="NIM" required>
            <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Mahasiswa" required>
            <input type="text" name="jurusan" class="form-control mb-2" placeholder="Jurusan" required>
            <input type="text" name="matakuliah" class="form-control mb-2" placeholder="Matakuliah" required>
            <input type="text" name="kelas" class="form-control mb-2" placeholder="kelas" required>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('mahasiswa/modal_import') ?>
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
