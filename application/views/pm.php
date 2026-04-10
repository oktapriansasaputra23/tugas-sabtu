<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Management — Dashboard</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* Simple custom styles for layout */
    body { background: #f6f8fb; }
    .sidebar { min-height: 100vh; background: #fff; border-right: 1px solid #e6ecef; }
    .card-compact { padding: .75rem; }
    .kanban-column { background: #f8fafc; border-radius: 8px; padding: 12px; min-height: 220px; }
    .kanban-card { background: #fff; border-radius: 8px; padding: 10px; margin-bottom: 10px; box-shadow: 0 1px 2px rgba(16,24,40,.04); }
    .badge-dot { width:8px; height:8px; display:inline-block; border-radius:99px; margin-right:6px; }
    @media (max-width: 991px) {
      .sidebar { min-height: auto; }
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- SIDEBAR -->
    <nav class="col-lg-2 sidebar d-none d-lg-block py-4">
      <div class="px-3">
        <a class="navbar-brand fw-bold text-primary" href="#">PM Dashboard</a>
        <hr>
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i> Overview</a></li>
          <li class="nav-item"><a class="nav-link" href="#kanban"><i class="bi bi-kanban me-2"></i> Kanban</a></li>
          <li class="nav-item"><a class="nav-link" href="#tasks"><i class="bi bi-list-task me-2"></i> Tasks</a></li>
          <li class="nav-item"><a class="nav-link" href="#reports"><i class="bi bi-graph-up me-2"></i> Reports</a></li>
          <li class="nav-item"><a class="nav-link" href="#team"><i class="bi bi-people me-2"></i> Team</a></li>
        </ul>
      </div>
    </nav>

    <main class="col-lg-10 ms-auto px-4">
      <!-- TOP NAV -->
      <header class="d-flex align-items-center justify-content-between py-3">
        <div class="d-flex align-items-center gap-3">
          <button class="btn btn-outline-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">Menu</button>
          <h4 class="mb-0">Overview</h4>
          <small class="text-muted">— Project Management</small>
        </div>

        <div class="d-flex align-items-center gap-3">
          <div class="input-group d-none d-md-flex" style="min-width:260px">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input class="form-control" placeholder="Cari tugas, proyek, anggota...">
          </div>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModal"><i class="bi bi-plus-lg me-1"></i> New Task</button>
          <div class="dropdown">
            <a class="btn btn-light rounded-circle" href="#" role="button" id="userMenu" data-bs-toggle="dropdown">
              <img src="https://ui-avatars.com/api/?name=PM&background=0D6EFD&color=fff" class="rounded-circle" width="36" height="36">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
            </ul>
          </div>
        </div>
      </header>

      <!-- KPI CARDS -->
      <section class="row g-3">
        <div class="col-sm-6 col-md-3">
          <div class="card card-compact">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">Active Projects</small>
                <h5 class="mb-0">8</h5>
              </div>
              <i class="bi bi-folder2-open fs-2 text-primary"></i>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3">
          <div class="card card-compact">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">Open Tasks</small>
                <h5 class="mb-0">24</h5>
              </div>
              <i class="bi bi-list-task fs-2 text-warning"></i>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3">
          <div class="card card-compact">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">Team Members</small>
                <h5 class="mb-0">12</h5>
              </div>
              <i class="bi bi-people fs-2 text-success"></i>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3">
          <div class="card card-compact">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">On Track %</small>
                <h5 class="mb-0">78%</h5>
              </div>
              <i class="bi bi-graph-up-arrow fs-2 text-info"></i>
            </div>
          </div>
        </div>
      </section>

      <!-- KANBAN -->
      <section id="kanban" class="mt-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="mb-0">Kanban Board</h5>
          <small class="text-muted">Drag & drop (JS needed)</small>
        </div>
        <div class="row g-3">
          <div class="col-12 col-md-3">
            <div class="kanban-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>Backlog</strong>
                <span class="badge bg-secondary">5</span>
              </div>

              <div class="kanban-card">
                <div class="d-flex justify-content-between">
                  <div>
                    <div class="fw-semibold">Landing page redesign</div>
                    <small class="text-muted">Design • 3 days</small>
                  </div>
                  <div class="text-end">
                    <div><span class="badge bg-warning">High</span></div>
                    <small class="d-block mt-2">@anna</small>
                  </div>
                </div>
              </div>

              <div class="kanban-card">
                <div class="fw-semibold">Integrate payment gateway</div>
                <small class="text-muted">Dev • 5 days</small>
              </div>

            </div>
          </div>

          <div class="col-12 col-md-3">
            <div class="kanban-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>To Do</strong>
                <span class="badge bg-secondary">3</span>
              </div>
              <div class="kanban-card">
                <div class="fw-semibold">Setup CI/CD</div>
                <small class="text-muted">Ops • 2 days</small>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-3">
            <div class="kanban-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>In Progress</strong>
                <span class="badge bg-secondary">2</span>
              </div>
              <div class="kanban-card">
                <div class="fw-semibold">API endpoint for tasks</div>
                <small class="text-muted">Dev • 1 day</small>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-3">
            <div class="kanban-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>Done</strong>
                <span class="badge bg-secondary">10</span>
              </div>
              <div class="kanban-card">
                <div class="fw-semibold">User auth</div>
                <small class="text-muted">Dev • 1 day</small>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- TASK TABLE and Reports -->
      <section id="tasks" class="mt-4">
        <div class="row">
          <div class="col-lg-7">
            <div class="card">
              <div class="card-body">
                <h5>Recent Tasks</h5>
                <div class="table-responsive">
                  <table class="table table-hover table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Project</th>
                        <th>Assignee</th>
                        <th>Due</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Fix responsive header</td>
                        <td>Website</td>
                        <td>Rizal</td>
                        <td>2025-11-25</td>
                        <td><span class="badge bg-warning text-dark">In Progress</span></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Create invoice template</td>
                        <td>Billing</td>
                        <td>Anna</td>
                        <td>2025-11-22</td>
                        <td><span class="badge bg-success">Done</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="card">
              <div class="card-body">
                <h5>Progress</h5>
                <p class="small text-muted">Project completion overview</p>
                <div class="mb-3">
                  <div class="d-flex justify-content-between">
                    <small>Website</small>
                    <small>80%</small>
                  </div>
                  <div class="progress" style="height:8px">
                    <div class="progress-bar" role="progressbar" style="width: 80%"></div>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="d-flex justify-content-between">
                    <small>Billing</small>
                    <small>55%</small>
                  </div>
                  <div class="progress" style="height:8px">
                    <div class="progress-bar" role="progressbar" style="width: 55%"></div>
                  </div>
                </div>

                <a href="#reports" class="stretched-link">View detailed reports</a>
              </div>
            </div>

            <div class="mt-3 card">
              <div class="card-body">
                <h6>Team</h6>
                <div class="d-flex gap-2 flex-wrap">
                  <img src="https://ui-avatars.com/api/?name=R" class="rounded-circle" width="40">
                  <img src="https://ui-avatars.com/api/?name=A" class="rounded-circle" width="40">
                  <img src="https://ui-avatars.com/api/?name=M" class="rounded-circle" width="40">
                  <div class="align-self-center ms-2 small text-muted">+9 more</div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- FOOTER -->
      <footer class="mt-5 mb-4 text-center small text-muted">
        © 2025 — Project Management UI • Built with Bootstrap
      </footer>
    </main>
  </div>
</div>


<!-- OFFCANVAS for mobile sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link active" href="#">Overview</a></li>
      <li class="nav-item"><a class="nav-link" href="#kanban">Kanban</a></li>
      <li class="nav-item"><a class="nav-link" href="#tasks">Tasks</a></li>
    </ul>
  </div>
</div>


<!-- NEW TASK MODAL -->
<div class="modal fade" id="newTaskModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Task</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="taskForm">
          <div class="row g-2">
            <div class="col-md-6">
              <label class="form-label">Title</label>
              <input class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Assignee</label>
              <input class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Project</label>
              <input class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Due Date</label>
              <input type="date" class="form-control">
            </div>
            <div class="col-12">
              <label class="form-label">Description</label>
              <textarea class="form-control" rows="4"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="document.getElementById('taskForm').requestSubmit();">Create</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Optional: small JS to show how to wire interactions (drag/drop requires a library) -->
<script>
  // Placeholder: replace with real data and event handlers
  document.getElementById('taskForm')?.addEventListener('submit', function(e){
    e.preventDefault();
    // collect form fields, call API, update UI
    const modal = bootstrap.Modal.getInstance(document.getElementById('newTaskModal'));
    modal?.hide();
    alert('Task created (demo)');
  });
</script>
</body>
</html>
