<section class="content">
<!-- <div class="content-wrapper p-3"> -->
    <div class="card">
        <div class="card-header"><h3>Tambah User</h3></div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
<!-- </div> -->
 </section>
