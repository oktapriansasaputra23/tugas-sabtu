<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Dashboard</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Welcome</h3>
            <p><?= $this->session->userdata('login_session')['name']; ?></p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
