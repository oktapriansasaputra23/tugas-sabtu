<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <h1>My Project</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">

      <!-- Project 1 - Manajemen Karyawan -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('manajemen') ?>" class="project-box">
          <div class="small-box project-card bg-primary">
            <div class="inner">
              <h4>Project A</h4>
              <p>Manajemen Data Karyawans</p>
            </div>
            <div class="icon">
              <i class="fas fa-users-cog"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 2 - POS / E-Commerce -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('ecommerce') ?>" class="project-box">
          <div class="small-box project-card bg-success">
            <div class="inner">
              <h4>Project B</h4>
              <p>Point of Sales</p>
            </div>
            <div class="icon">
              <i class="fas fa-cash-register"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 3 - Sistem Akademik -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('siakad') ?>" class="project-box">
          <div class="small-box project-card bg-warning">
            <div class="inner">
              <h4>Project C</h4>
              <p>Sistem Akademik</p>
            </div>
            <div class="icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 4 - Antrian -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('antrian') ?>" class="project-box">
          <div class="small-box project-card bg-danger">
            <div class="inner">
              <h4>Project D</h4>
              <p>Aplikasi Antrian</p>
            </div>
            <div class="icon">
              <i class="fas fa-bell"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 5 - Project Management -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('pm') ?>" class="project-box">
          <div class="small-box project-card bg-secondary">
            <div class="inner">
              <h4>Project E</h4>
              <p>Project Management</p>
            </div>
            <div class="icon">
              <i class="fas fa-diagram-project"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 6 - Kasir -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('kasir') ?>" class="project-box">
          <div class="small-box project-card bg-info">
            <div class="inner">
              <h4>Project F</h4>
              <p>Kasir</p>
            </div>
            <div class="icon">
              <i class="fas fa-receipt"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 7 - Company Profile -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('compro') ?>" class="project-box">
          <div class="small-box project-card bg-dark">
            <div class="inner text-white">
              <h4>Project G</h4>
              <p>Company Profile</p>
            </div>
            <div class="icon text-white">
              <i class="fas fa-building"></i>
            </div>
          </div>
        </a>
      </div>

      <!-- Project 8 - SIMRS -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('simrs') ?>" class="project-box">
          <div class="small-box project-card" style="background:#0C8B8E; color:white;">
            <div class="inner">
              <h4>Project H</h4>
              <p>SIMRS</p>
            </div>
            <div class="icon">
              <i class="fas fa-hospital"></i>
            </div>
          </div>
        </a>
      </div>

       <!-- Project 8 - SIMRS -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('formbuilder') ?>" class="project-box">
          <div class="small-box project-card" style="background:#0C8B8E; color:white;">
            <div class="inner">
              <h4>Project I</h4>
              <p>Template Form</p>
            </div>
            <div class="icon">
              <i class="fas fa-hospital"></i>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="<?= site_url('travel') ?>" class="project-box">
          <div class="small-box project-card" style="background:#0C8B8E; color:white;">
            <div class="inner">
              <h4>Project I</h4>
              <p>Travel</p>
            </div>
            <div class="icon">
              <i class="fas fa-hospital"></i>
            </div>
          </div>
        </a>
      </div>


    </div>

  </div>
</section>

<!-- Custom Style -->
<style>
.project-box { text-decoration: none; }
.project-card {
  border-radius: 12px !important;
  transition: 0.3s;
  color: white;
}
.project-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
}
.project-card .inner h4 {
  font-weight: bold;
  margin-bottom: 5px;
}
.project-card .icon {
  top: 10px !important;
  font-size: 45px;
  opacity: 0.3;
  position: absolute;
  right: 15px;
}
</style>
