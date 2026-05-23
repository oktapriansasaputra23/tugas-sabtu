<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($title) ? $title : 'Dashboard' ?></title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">
  <!-- <link rel="icon" href="<?= base_url('assets/adminlte/img/favicon.ico'); ?>" type="image/x-icon"> -->
<!-- Kalau pakai PNG -->
<link rel="icon" href="<?= base_url('assets/adminlte/img/logo_icon.png'); ?>" type="image/png">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="<?= site_url('auth/logout') ?>" class="nav-link text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
         <!-- <a href="#" class="d-block">
            <?= $this->session->userdata('login_session')['name']; ?>
          </a> -->
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('dashboard'); ?>" class="brand-link">
        <i class="fas fa-user-shield brand-image elevation-3" 
        style="font-size:32px; color:white; opacity:0.9;"></i>
        <span class="brand-text font-weight-light ml-2">Admin Panel</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            <?= $this->session->userdata('login_session')['name']; ?>
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">

          <li class="nav-item">
            <a href="<?= site_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item">
              <a href="<?= site_url('project') ?>" class="nav-link">
                  <i class="nav-icon fas fa-project-diagram"></i>
                  <p>Project</p>
              </a>
          </li>

          <!-- <li class="nav-item">
              <a href="<?= site_url('barang') ?>" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>Master Barang</p>
              </a>
          </li>


          <li class="nav-item">
              <a href="<?= site_url('transaksi') ?>" class="nav-link">
                  <i class="nav-icon fas fa-exchange-alt"></i>
                  <p>Transaksi</p>
              </a>
          </li> -->

           <li class="nav-item">
              <a href="<?= site_url('mahasiswa') ?>" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>Data Mahasiswa</p>
              </a>
          </li>


          <li class="nav-item">
              <a href="<?= site_url('penilaian') ?>" class="nav-link">
                  <i class="nav-icon fas fa-exchange-alt"></i>
                  <p>Penilaian</p>
              </a>
          </li>

       

         
        <li class="nav-item">
            <a href="<?= site_url('user') ?>" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>User Management</p>
            </a>
        </li>


        </ul>
      </nav>
    </div>
  </aside>
</br>
  <!-- Content Wrapper -->
  <div class="content-wrapper">
