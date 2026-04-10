<div class="content-wrapper p-3">
<div class="card">
<div class="card-header"><h3>Edit User</h3></div>
<div class="card-body">
<form method="post">
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" value="<?= $user->username ?>" required>
</div>
<div class="form-group">
<label>Password (kosongkan jika tidak ganti)</label>
<input type="password" name="password" class="form-control">
</div>
<div class="form-group">
<label>Nama</label>
<input type="text" name="name" class="form-control" value="<?= $user->name ?>">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" value="<?= $user->email ?>">
</div>
<div class="form-group">
<label>Role</label>
<select name="role" class="form-control">
<option value="admin" <?= $user->role=='admin'?'selected':'' ?>>Admin</option>
<option value="user" <?= $user->role=='user'?'selected':'' ?>>User</option>
</select>
</div>
<button class="btn btn-success">Update</button>
</form>
</div>
</div>
</div>