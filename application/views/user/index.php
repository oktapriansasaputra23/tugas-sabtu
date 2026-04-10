<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Management</h3>
            <a href="<?= base_url('user/add'); ?>" class="btn btn-primary btn-sm float-right">Tambah User</a>
        </div>
        <div class="card-body">
            <!-- <table class="table table-bordered table-striped"> -->
                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach  ($users as $u): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u->username ?></td>
                        <td><?= $u->name ?></td>
                        <td><?= $u->email ?></td>
                        <td><?= $u->role ?></td>
                        <td>
                            <a href="<?= base_url('user/edit/'.$u->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('user/delete/'.$u->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
$(function() {
    $('#dataTable').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        lengthChange: true,
        pageLength: 10
    });
});
</script>