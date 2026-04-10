<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | ProjectMe</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">

  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #0c4aad, #102a43, #1b3b73);
      background-size: 400% 400%;
      animation: gradientMove 12s ease infinite;
      font-family: "Poppins", sans-serif;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login-box {
      width: 410px;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.12);
      padding: 35px 30px;
      border-radius: 20px;
      box-shadow: 0 10px 35px rgba(0,0,0,0.25);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-logo a {
      font-size: 38px;
      color: #fff !important;
      font-weight: 700;
      text-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    .btn-primary {
      background: linear-gradient(135deg, #007bff, #0056d6);
      border: none;
      border-radius: 30px;
      padding: 10px;
      font-weight: bold;
      box-shadow: 0 4px 15px rgba(0,123,255,0.4);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 25px rgba(0,123,255,0.6);
    }

    input.form-control {
      border-radius: 30px;
      padding-left: 20px;
      height: 45px;
      border: none !important;
    }

    .input-group-text {
      border-radius: 30px;
      background: rgba(255,255,255,0.2);
      border: none !important;
      color: #fff;
    }

    .text-white-muted {
      color: rgba(255,255,255,0.75);
    }

    a { color: #ffe082; }
    a:hover { color: #fff; }
  </style>
</head>

<body>

<div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
  <div class="login-box">

    <div class="login-logo">
      <a href="#"><b>Project</b>Me</a>
    </div>

    <div class="glass-card">
      <p class="text-center text-white-muted mb-4">Silakan masuk untuk melanjutkan</p>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
      <?php endif; ?>

      <form action="<?= site_url('auth/login') ?>" method="post">

        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
        </div>

        <div class="d-flex justify-content-between mb-3">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember" class="text-white-muted">Ingat saya</label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      </form>

      <div class="mt-4 text-center">
        <a href="<?= site_url('auth/forgot') ?>">Lupa password?</a><br>
        <a href="<?= site_url('auth/register') ?>">Daftar akun baru</a>
      </div>

    </div>
  </div>
</div>

<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>

</body>
</html>
