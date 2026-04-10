<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Antrian</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f3f6fc;
    }

    .queue-box {
      background: #fff;
      border-radius: 18px;
      padding: 25px;
      text-align: center;
      box-shadow: 0 4px 18px rgba(0,0,0,0.1);
    }

    .queue-number {
      font-size: 90px;
      font-weight: 700;
      color: #2b50e6;
      margin-bottom: 10px;
    }

    .loket-card {
      border-radius: 15px;
      padding: 20px;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .btn-call {
      width: 100%;
      padding: 15px;
      font-size: 20px;
      border-radius: 12px;
    }
  </style>
</head>

<body>

<div class="container py-5">

  <h2 class="mb-4 fw-bold text-center">Sistem Antrian Modern</h2>

  <div class="row g-4">

    <!-- Display Antrian -->
    <div class="col-lg-6">
      <div class="queue-box">
        <h4 class="text-secondary">Nomor Antrian Sekarang</h4>
        <div class="queue-number" id="currentQueue">A001</div>
        <p class="text-muted">Silakan menuju loket pelayanan</p>
      </div>
    </div>

    <!-- Ambil Nomor -->
    <div class="col-lg-6">
      <div class="queue-box">
        <h4 class="text-secondary">Ambil Nomor Antrian</h4>
        <button class="btn btn-primary btn-lg mt-3" onclick="ambilNomor()">
          Ambil Nomor Baru
        </button>
        <div class="mt-4">
          <h5>Nomor Anda:</h5>
          <span class="queue-number" id="myQueue">-</span>
        </div>
      </div>
    </div>

  </div>

  <hr class="my-5">

  <!-- Loket -->
  <h3 class="fw-semibold mb-3">Loket Pelayanan</h3>

  <div class="row g-4">

    <!-- Loket 1 -->
    <div class="col-lg-4">
      <div class="loket-card">
        <h4 class="fw-bold">Loket 1</h4>
        <p class="text-secondary">Petugas: Andi</p>
        <button class="btn btn-success btn-call" onclick="panggil('1')">
          Panggil Antrian
        </button>
      </div>
    </div>

    <!-- Loket 2 -->
    <div class="col-lg-4">
      <div class="loket-card">
        <h4 class="fw-bold">Loket 2</h4>
        <p class="text-secondary">Petugas: Budi</p>
        <button class="btn btn-success btn-call" onclick="panggil('2')">
          Panggil Antrian
        </button>
      </div>
    </div>

    <!-- Loket 3 -->
    <div class="col-lg-4">
      <div class="loket-card">
        <h4 class="fw-bold">Loket 3</h4>
        <p class="text-secondary">Petugas: Sari</p>
        <button class="btn btn-success btn-call" onclick="panggil('3')">
          Panggil Antrian
        </button>
      </div>
    </div>
  </div>

</div>
<audio id="soundBell">
  <source src="https://assets.mixkit.co/active_storage/sfx/2339/2339-preview.mp3" type="audio/mpeg">
</audio>


<script>
  let nomor = 1;

  function ambilNomor() {
    let formatted = "A" + nomor.toString().padStart(3, '0');
    document.getElementById("myQueue").textContent = formatted;
    nomor++;
  }

  function panggil(loket) {
    let next = "A" + (nomor - 1).toString().padStart(3, '0');
    document.getElementById("currentQueue").textContent = next;

    // 🔊 mainkan suara bell
    let bell = document.getElementById("soundBell");
    bell.currentTime = 0;
    bell.play();

    // popup info
    alert("Memanggil nomor " + next + " ke Loket " + loket);
  }
</script>



</body>
</html>
