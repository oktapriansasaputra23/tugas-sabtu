<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: white;
            padding: 80px 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
        }
        .section-title {
            font-weight: 700;
            margin-bottom: 30px;
        }
        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        footer {
            background: #2d3436;
            color: white;
            padding: 30px 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">MyPortofolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Keahlian</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Projek</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero" id="home">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Halo, Saya <span style="color:#ffeaa7">El Solutions</span></h1>
        <p class="lead mt-3">Web Developer | UI/UX Enthusiast | Freelancer</p>
        <a href="#projects" class="btn btn-light mt-4 px-4 py-2 rounded-pill fw-bold">Lihat Projek</a>
    </div>
</section>

<section class="py-5" id="about">
    <div class="container">
        <h2 class="section-title text-center">Tentang Saya</h2>
        <p class="text-center col-md-8 mx-auto">Saya seorang pengembang web yang berpengalaman dalam membangun aplikasi modern dengan teknologi terbaru. Fokus pada tampilan yang bersih, performa cepat, dan pengalaman pengguna yang nyaman.</p>
    </div>
</section>

<section class="py-5 bg-light" id="skills">
    <div class="container">
        <h2 class="section-title text-center">Keahlian</h2>
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card card-custom p-4 text-center">
                    <h5 class="fw-bold">Frontend Development</h5>
                    <p>HTML, CSS, Bootstrap, JavaScript</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom p-4 text-center">
                    <h5 class="fw-bold">Backend Development</h5>
                    <p>PHP, CodeIgniter, MySQL</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom p-4 text-center">
                    <h5 class="fw-bold">UI/UX Design</h5>
                    <p>Figma, Wireframing, Prototyping</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="projects">
    <div class="container">
        <h2 class="section-title text-center">Projek</h2>
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="project1">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Project 1</h5>
                        <p class="card-text">Deskripsi singkat mengenai projek yang pernah kamu buat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="project2">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Project 2</h5>
                        <p class="card-text">Deskripsi singkat mengenai projek yang pernah kamu buat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="project3">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Project 3</h5>
                        <p class="card-text">Deskripsi singkat mengenai projek yang pernah kamu buat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" id="contact">
    <div class="container">
        <h2 class="section-title text-center">Kontak</h2>
        <div class="col-md-6 mx-auto">
            <form class="card card-custom p-4">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama lengkap">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Alamat email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pesan</label>
                    <textarea class="form-control" rows="4" placeholder="Tulis pesan"></textarea>
                </div>
                <button class="btn btn-primary w-100 py-2">Kirim</button>
            </form>
        </div>
    </div>
</section>

<footer class="text-center">
    <p>© 2025 Nama Kamu. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
