<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Data Karyawan</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background:#f3f6fa;
    }
    .page-title {
      font-weight: 700;
      color:#2d3436;
    }
    .card-stat {
      border-radius: 16px;
      transition: .3s;
    }
    .card-stat:hover {
      transform: translateY(-5px);
      box-shadow:0 8px 18px rgba(0,0,0,0.1);
    }
    .table thead {
      background:#2d3436;
      color:#fff;
    }
    .btn-add {
      border-radius:10px;
      padding:10px 18px;
      font-weight:600;
    }
  </style>
</head>

<body>

<div class="container py-4">

  <!-- TITLE -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Manajemen Data Karyawan</h2>
    <button class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#modalTambah">
      <i class="fa fa-plus"></i> Tambah Karyawan
    </button>
  </div>

  <!-- STAT CARDS -->
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card card-stat p-3 shadow-sm">
        <h5><i class="fa fa-users text-primary"></i> Total Karyawan</h5>
        <h3 class="mt-2 fw-bold">124</h3>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-stat p-3 shadow-sm">
        <h5><i class="fa fa-user-tie text-success"></i> Aktif</h5>
        <h3 class="mt-2 fw-bold">118</h3>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-stat p-3 shadow-sm">
        <h5><i class="fa fa-user-xmark text-danger"></i> Non-Aktif</h5>
        <h3 class="mt-2 fw-bold">6</h3>
      </div>
    </div>
  </div>

  <!-- TABLE -->
  <div class="card shadow-sm p-3 rounded-4">
    <table class="table table-hover table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Departemen</th>
          <th>Status</th>
          <th width="150">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Budi Santoso</td>
          <td>Supervisor</td>
          <td>Operasional</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td>
            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td>Anna Wijaya</td>
          <td>HRD</td>
          <td>Kepegawaian</td>
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

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tambah Karyawan</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <div class="mb-3">
          <label>Nama Karyawan</label>
          <input type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label>Jabatan</label>
          <input type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label>Departemen</label>
          <input type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label>Status</label>
          <select class="form-control">
            <option>Aktif</option>
            <option>Non-Aktif</option>
          </select>
        </div>

      </div>

      <div class="modal-footer">
        <button class="btn btn-primary">Simpan</button>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
