<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Akademik</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body { background: #f4f6f9; }
    .page-title { font-weight: 700; color:#2c3e50; }
    .card-stat {
      border-radius: 16px;
      transition: .3s;
    }
    .card-stat:hover {
      transform: translateY(-5px);
      box-shadow:0 8px 18px rgba(0,0,0,0.12);
    }
    thead { background:#2c3e50; color:white; }
    .btn-add { border-radius:10px; font-weight:600; }
  </style>
</head>

<body>

<div class="container py-4">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Sistem Akademik</h2>
    <button class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#modalTambah">
      <i class="fa fa-plus"></i> Tambah Mahasiswa
    </button>
  </div>

  <!-- Stat Cards -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card card-stat p-3 shadow-sm">
        <h6><i class="fa fa-users text-primary"></i> Total Mahasiswa</h6>
        <h3 class="fw-bold mt-2">1.245</h3>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card card-stat p-3 shadow-sm">
        <h6><i class="fa fa-user-tie text-success"></i> Total Dosen</h6>
        <h3 class="fw-bold mt-2">82</h3>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card card-stat p-3 shadow-sm">
        <h6><i class="fa fa-book text-warning"></i> Matakuliah</h6>
        <h3 class="fw-bold mt-2">156</h3>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card card-stat p-3 shadow-sm">
        <h6><i class="fa fa-calendar-alt text-danger"></i> Jadwal Aktif</h6>
        <h3 class="fw-bold mt-2">45</h3>
      </div>
    </div>
  </div>

  <!-- Table -->
  <div class="card shadow-sm p-3 rounded-4">
    <table class="table table-hover table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Program Studi</th>
          <th>Status</th>
          <th width="150">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>21010203</td>
          <td>Rahmat Hidayat</td>
          <td>TI-3A</td>
          <td>Teknik Informatika</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td>
            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td>21010214</td>
          <td>Sinta Amelia</td>
          <td>TI-3B</td>
          <td>Teknik Informatika</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td>
            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tambah Mahasiswa</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <div class="mb-3">
          <label>NIM</label>
          <input type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label>Kelas</label>
          <input type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label>Program Studi</label>
          <select class="form-control">
            <option>Teknik Informatika</option>
            <option>Sistem Informasi</option>
            <option>Teknik Elektro</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Status</label>
          <select class="form-control">
            <option>Aktif</option>
            <option>Lulus</option>
            <option>Cuti</option>
          </select>
        </div>

      </div>

      <div class="modal-footer">
        <button class="btn btn-primary">Simpan</button>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
