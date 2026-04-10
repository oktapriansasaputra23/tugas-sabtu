<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Undangan Pernikahan Anna & Budi</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #fff5f7;
    }

    
    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://via.placeholder.com/1920x700') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 150px 20px;
    }
    .hero h1 {
      font-family: 'Great Vibes', cursive;
      font-size: 5rem;
      margin-bottom: 20px;
    }
    .section-title {
      text-align: center;
      margin-bottom: 50px;
      font-weight: bold;
    }
    .card:hover {
      transform: translateY(-10px);
      transition: 0.3s;
    }
    footer {
      background: #ff6f91;
      color: white;
      padding: 30px 0;
    }
    .confetti {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 9999;
    }
  </style>
</head>
<body>

<!-- Confetti Canvas -->
<canvas id="confetti" class="confetti"></canvas>

<!-- Background Music (Optional) -->
<button id="musicToggle" class="btn btn-sm btn-light position-fixed" style="bottom: 20px; right: 20px; z-index: 10000;">
    <span id="musicIcon">▶️</span> Musik
</button>

<audio id="backgroundMusic" loop>
    <source src="https://www.bensound.com/bensound-music/bensound-romantic.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Hero / Banner -->
<section class="hero">
  <div class="container">
    <h1 class="animate__animated animate__fadeInDown">Anna & Budi</h1>
    <p class="lead animate__animated animate__fadeInUp">Dengan hormat mengundang Anda untuk hadir di hari bahagia kami</p>
    <p class="animate__animated animate__fadeInUp">Sabtu, 28 Desember 2025</p>
    <a href="#acara" class="btn btn-light btn-lg mt-3 animate__animated animate__fadeInUp">Lihat Acara</a>
  </div>
</section>
<!-- Detail Acara -->
<section id="acara" class="py-5">
  <div class="container">
    <h2 class="section-title animate__animated animate__fadeInUp">Detail Acara</h2>
    <div class="row text-center g-4">
      <div class="col-md-6 animate__animated animate__fadeInLeft">
        <div class="card p-4 shadow-sm">
          <h4>Akad Nikah</h4>
          <p>Sabtu, 28 Desember 2025</p>
          <p>08:00 WIB</p>
          <p>Masjid Al-Falah, Jakarta</p>
        </div>
      </div>
      <div class="col-md-6 animate__animated animate__fadeInRight">
        <div class="card p-4 shadow-sm">
          <h4>Resepsi</h4>
          <p>Sabtu, 28 Desember 2025</p>
          <p>10:00 - 14:00 WIB</p>
          <p>Gedung Serbaguna, Jakarta</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Countdown -->
<section id="countdown" class="py-5 bg-light">
  <div class="container text-center animate__animated animate__zoomIn">
    <h2 class="section-title">Countdown Pernikahan</h2>
    <h3 id="timer" class="display-4"></h3>
  </div>
</section>

<!-- Lokasi & Peta -->
<section id="lokasi" class="py-5">
  <div class="container">
    <h2 class="section-title animate__animated animate__fadeInUp">Lokasi Acara</h2>
    <div class="row justify-content-center animate__animated animate__fadeInUp">
      <div class="col-md-8">
  <iframe 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31686.95436687934!2d106.827153!3d-6.175392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e987654321%3A0x123456789abcdef!2sMasjid%20Al-Falah%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000" 
  width="100%" 
  height="400" 
  style="border:0;" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>

      </div>
    </div>
  </div>
</section>

<!-- Galeri Foto -->
<section id="galeri" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title animate__animated animate__fadeInUp">Galeri Kami</h2>
    <div class="row g-4">
      <div class="col-md-4 animate__animated animate__zoomIn"><img src="assets/adminlte/img/avatar.png" class="img-fluid rounded shadow-sm"></div>
      <div class="col-md-4 animate__animated animate__zoomIn"><img src="assets/adminlte/img/avatar2.png" class="img-fluid rounded shadow-sm"></div>
      <div class="col-md-4 animate__animated animate__zoomIn"><img src="assets/adminlte/img/avatar3.png" class="img-fluid rounded shadow-sm"></div>
    </div>
  </div>
</section>

<!-- Form RSVP -->
<section id="rsvp" class="py-5">
  <div class="container">
    <h2 class="section-title animate__animated animate__fadeInUp">Konfirmasi Kehadiran</h2>
    <div class="row justify-content-center">
      <div class="col-md-6 animate__animated animate__fadeInUp">
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" placeholder="Nama Anda">
          </div>
          <div class="mb-3">
            <label for="attend" class="form-label">Kehadiran</label>
            <select class="form-select" id="attend">
              <option value="hadir">Hadir</option>
              <option value="tidak">Tidak Hadir</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <div class="container text-center">
    <p>&copy; 2025 Anna & Budi. Terima kasih atas kehadiran Anda.</p>
  </div>
</footer>

<!-- Bootstrap JS & Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Countdown Timer
  const countDownDate = new Date("May 25, 2025 08:00:00").getTime();
  const timer = document.getElementById("timer");
  setInterval(() => {
    const now = new Date().getTime();
    const distance = countDownDate - now;
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    timer.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
  }, 1000);


  // Kontrol Musik
const music = document.getElementById('backgroundMusic');
const musicToggle = document.getElementById('musicToggle');
const musicIcon = document.getElementById('musicIcon');
let isPlaying = false;

// Coba putar musik saat halaman dimuat (untuk browser yang mengizinkan)
music.play().catch(error => {
    // Musik tidak bisa diputar otomatis
    isPlaying = false;
    musicIcon.textContent = '▶️';
});

musicToggle.addEventListener('click', () => {
    if (isPlaying) {
        music.pause();
        musicIcon.textContent = '▶️';
    } else {
        music.play();
        musicIcon.textContent = '⏸️';
    }
    isPlaying = !isPlaying;
});

  // Simple Confetti
  const confettiCanvas = document.getElementById('confetti');
  const ctx = confettiCanvas.getContext('2d');
  confettiCanvas.width = window.innerWidth;
  confettiCanvas.height = window.innerHeight;
  const confettiCount = 100;
  const confetti = [];
  for(let i=0;i<confettiCount;i++){
    confetti.push({
      x: Math.random()*confettiCanvas.width,
      y: Math.random()*confettiCanvas.height,
      r: Math.random()*6+2,
      d: Math.random()*confettiCount
    });
  }
  function drawConfetti(){
    ctx.clearRect(0,0,confettiCanvas.width,confettiCanvas.height);
    ctx.fillStyle='rgba(255,192,203,0.7)';
    ctx.beginPath();
    for(let i=0;i<confettiCount;i++){
      let f = confetti[i];
      ctx.moveTo(f.x,f.y);
      ctx.arc(f.x,f.y,f.r,0,Math.PI*2,true);
    }
    ctx.fill();
    updateConfetti();
  }
  function updateConfetti(){
    for(let i=0;i<confettiCount;i++){
      let f = confetti[i];
      f.y += Math.cos(f.d)+1+f.r/2;
      f.x += Math.sin(f.d)*2;
      if(f.y > confettiCanvas.height){ f.y = -10; f.x = Math.random()*confettiCanvas.width; }
    }
  }
  setInterval(drawConfetti,30);
</script>

</body>
</html>
