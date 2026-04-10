<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company Profile — PT Bumi Petro Sriwijaya</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Corporate Style -->
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f8fc;
    }

    /* NAVBAR */
    .navbar {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    }

    /* HERO */
    .hero {
      height: 90vh;
      background: linear-gradient(120deg, #003b95, #005dd1);
      display: flex;
      align-items: center;
      color: white;
    }

    .hero h1 {
      font-size: 3.2rem;
      font-weight: 700;
    }

    /* SECTION TITLE */
    .section-title {
      font-size: 2.2rem;
      font-weight: 700;
      color: #003b95;
    }

    /* SERVICE CARD */
    .service-card {
      background: white;
      padding: 30px;
      border-radius: 14px;
      transition: 0.3s;
      border: 1px solid #e5e9f0;
    }
    .service-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    /* FOOTER */
    footer {
      background: #002653;
      color: white;
      padding: 25px 0;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
  <div class="container">
    
    <!-- LOGO + TEXT -->
    <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="#">
      <img src="assets/adminlte/img/logo_bumi.jpeg" alt="Logo" 
           style="height:40px; width:auto; margin-right:10px;">
      PT Bumi Petro Sriwijaya
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto gap-3">
        <li class="nav-item"><a href="#about" class="nav-link">Tentang</a></li>
        <li class="nav-item"><a href="#services" class="nav-link">Layanan</a></li>
        <li class="nav-item"><a href="#portfolio" class="nav-link">Portfolio</a></li>
        <li class="nav-item">
          <a href="#contact" 
             class="nav-link btn btn-primary text-white px-3 rounded-pill">
             Kontak
          </a>
        </li>
      </ul>
    </div>

  </div>
</nav>


<!-- HERO -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 text-white">
        <h1>Solusi Profesional untuk Masa Depan Bisnis Anda</h1>
        <p class="mt-3 lead">
          Kami adalah perusahaan profesional yang berkomitmen memberikan layanan berkualitas tinggi 
          untuk membantu pertumbuhan dan transformasi bisnis Anda.
        </p>
        <a href="#services" class="btn btn-light btn-lg mt-3 fw-semibold px-4">Pelajari Layanan</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="https://images.unsplash.com/photo-1591696205602-2f950c417cb9"
             class="img-fluid rounded" alt="Business Image">
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4">Tentang Kami</h2>

    <div class="row g-4 align-items-center">
      <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1560264418-c4445382edbc"
             class="img-fluid rounded shadow">
      </div>

      <div class="col-md-6">
        <h4 class="fw-bold">PT Bumi Petro Sriwijaya</h4>
        <p class="mt-2">
          Kami adalah perusahaan yang bergerak di bidang teknologi, konsultan bisnis, dan solusi sistem informasi.
          Dengan pengalaman lebih dari 10 tahun, kami telah membantu lebih dari 200 perusahaan mempercepat produktivitas 
          dan efisiensi operasional.
        </p>
        <p>
          Visi kami adalah menjadi partner terpercaya dalam transformasi digital di Indonesia.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services" class="py-5 bg-white">
  <div class="container">
    <h2 class="section-title text-center mb-5">Layanan Kami</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="service-card text-center">
          <i class="fa-solid fa-laptop-code fa-3x text-primary mb-3"></i>
          <h5 class="fw-bold">Pengembangan Aplikasi</h5>
          <p>Membangun aplikasi modern, scalable, dan berkualitas tinggi untuk mendukung bisnis Anda.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="service-card text-center">
          <i class="fa-solid fa-chart-line fa-3x text-primary mb-3"></i>
          <h5 class="fw-bold">Konsultasi Bisnis</h5>
          <p>Membantu perusahaan menganalisis, merancang strategi, dan meningkatkan performa bisnis.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="service-card text-center">
          <i class="fa-solid fa-database fa-3x text-primary mb-3"></i>
          <h5 class="fw-bold">Sistem Informasi</h5>
          <p>Pembuatan sistem informasi lengkap untuk manajemen perusahaan yang lebih efektif.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-5">Portfolio</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786"
             class="img-fluid rounded shadow">
      </div>

      <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0"
             class="img-fluid rounded shadow">
      </div>

      <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1581092334420-88f882ad1f4e"
             class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4">Hubungi Kami</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="p-4 bg-white shadow rounded">
          <div class="mb-3">
            <label class="form-label fw-bold">Nama</label>
            <input type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Pesan</label>
            <textarea class="form-control" rows="4"></textarea>
          </div>

          <button class="btn btn-primary w-100 fw-semibold">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="container text-center">
    <p class="m-0">&copy; 2025 PT Bumi Petro Sriwijaya — All Rights Reserved</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
