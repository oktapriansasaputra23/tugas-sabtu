<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Rumah Sakit (SIMRS)</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f7fb;
    }
    .sidebar {
      height: 100vh;
      background: #13314E;
      color: white;
      padding-top: 20px;
      position: fixed;
      width: 260px;
    }
    .sidebar a {
      color: #d6e4f0;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #fff;
    }
    .content {
      margin-left: 260px;
      padding: 30px;
    }
    .logo-img {
      height: 60px;
      width: 60px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 10px;
    }
    .menu-title {
      font-size: 13px;
      text-transform: uppercase;
      opacity: .7;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar text-center">
    <img src="/mnt/data/1b53720a-11ce-4b02-b90f-b6352e0c8820.png" class="logo-img mb-2">

    <h5 class="mb-4">SIMRS</h5>

    <div class="text-start px-3">

      <p class="menu-title">Menu Utama</p>

      <a href="#" class="d-block py-2"><i class="fa fa-home me-2"></i> Dashboard</a>
      <a href="#" class="d-block py-2"><i class="fa fa-users me-2"></i> Pendaftaran Pasien</a>
      <a href="#" class="d-block py-2"><i class="fa fa-stethoscope me-2"></i> Rawat Jalan</a>
      <a href="#" class="d-block py-2"><i class="fa fa-hospital me-2"></i> Rawat Inap</a>
      <a href="#" class="d-block py-2"><i class="fa fa-file-medical me-2"></i> Rekam Medis</a>
      <a href="#" class="d-block py-2"><i class="fa fa-pills me-2"></i> Farmasi</a>
      <a href="#" class="d-block py-2"><i class="fa fa-money-bill me-2"></i> Billing</a>

      <p class="menu-title">Pengaturan</p>

      <a href="#" class="d-block py-2"><i class="fa fa-user-gear me-2"></i> Manajemen User</a>
      <a href="#" class="d-block py-2"><i class="fa fa-door-open me-2"></i> Logout</a>
    </div>
  </div>

  <!-- Content -->
  <div class="content">

    <h2 class="mb-4 fw-bold">Dashboard Sistem Informasi Rumah Sakit</h2>

    <div class="row g-3">

      <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-primary text-white">
          <div class="card-body">
            <h5>Pasien Hari Ini</h5>
            <h3>128</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-success text-white">
          <div class="card-body">
            <h5>Rawat Jalan</h5>
            <h3>57</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-warning text-dark">
          <div class="card-body">
            <h5>Rawat Inap</h5>
            <h3>23</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-info text-dark">
          <div class="card-body">
            <h5>Antrian</h5>
            <h3>42</h3>
          </div>
        </div>
      </div>

    </div>

    <hr class="my-5">

    <h4 class="mb-3">Data Antrian</h4>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nomor Antrian</th>
          <th>Poli</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>A001</td>
          <td>Poli Umum</td>
          <td><span class="badge bg-success">Dipanggil</span></td>
        </tr>
        <tr>
          <td>2</td>
          <td>A002</td>
          <td>Poli Gigi</td>
          <td><span class="badge bg-warning text-dark">Menunggu</span></td>
        </tr>
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
