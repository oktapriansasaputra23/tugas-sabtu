
<!DOCTYPE html>
<html>
<head>
<title>Rental Mobil Nusantara</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<style>
.hero {
    background: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70') center/cover;
    height: 500px;
    color: white;
}

.hero-overlay {
    background: rgba(0,0,0,0.6);
    height: 100%;
}

.section {
    padding: 80px 0;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand" href="#">Rental Mobil</a>

<button class="navbar-toggler" data-toggle="collapse" data-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('mobil') ?>">Daftar Mobil</a></li>
<li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
<li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
</ul>
</div>
</div>
</nav>


<!-- HERO SECTION -->
<section class="hero">
<div class="hero-overlay d-flex align-items-center">
<div class="container text-center">

<h1>Sewa Mobil Mudah & Terpercaya</h1>
<p>Harga murah, armada lengkap, siap antar jemput</p>

<a href="<?= base_url('mobil') ?>" class="btn btn-warning btn-lg">
Lihat Mobil
</a>

</div>
</div>
</section>


<!-- KEUNGGULAN -->
<section class="section bg-light">
<div class="container text-center">

<h2 class="mb-5">Kenapa Pilih Kami?</h2>

<div class="row">

<div class="col-md-4">
<h4>Harga Terjangkau</h4>
<p>Tarif sewa kompetitif dan transparan</p>
</div>

<div class="col-md-4">
<h4>Armada Lengkap</h4>
<p>Tersedia city car hingga mobil keluarga</p>
</div>

<div class="col-md-4">
<h4>Support 24 Jam</h4>
<p>Layanan pelanggan siap membantu kapan saja</p>
</div>

</div>
</div>
</section>


<!-- MOBIL POPULER -->
<section class="section">
<div class="container text-center">

<h2 class="mb-5">Mobil Favorit</h2>

<div class="row">

<div class="col-md-4">
<div class="card">
<img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2" class="card-img-top">
<div class="card-body">
<h5>Toyota Avanza</h5>
<p>Rp350.000 / hari</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<img src="https://images.unsplash.com/photo-1550355291-bbee04a92027" class="card-img-top">
<div class="card-body">
<h5>Honda Brio</h5>
<p>Rp300.000 / hari</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<img src="https://images.unsplash.com/photo-1549921296-3ecf9d7e1f11" class="card-img-top">
<div class="card-body">
<h5>Innova Reborn</h5>
<p>Rp550.000 / hari</p>
</div>
</div>
</div>

</div>
</div>
</section>


<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">
Copyright © <?= date('Y') ?> Rental Mobil Nusantara
</footer>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
