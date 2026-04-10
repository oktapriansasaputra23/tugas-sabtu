<style>
.table thead th {
    vertical-align: middle;
    font-weight: 600;
}

.table tbody tr:hover {
    background-color: #f2f6ff;
    transition: 0.2s;
}

.badge {
    font-size: 0.8rem;
    border-radius: 20px;
}

.card {
    border-radius: 12px;
}
</style>

<div class="container-fluid">

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTiket">
    <i class="fas fa-plus"></i> Buat Tiket
</button>


   <div class="card shadow-sm">
    <div class="card-body">

        <table id="datatable" class="table table-hover table-striped table-bordered text-sm">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th width="140">Kode</th>
                    <th>Nama Pelapor</th>
                    <th>Judul</th>
                    <th width="120">Unit</th>
                    <th width="120">Prioritas</th>
                    <th width="120">Status</th>
                    <th width="150">Tanggal</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tiket as $row): ?>
                <tr>
                    <td class="text-center">
                        <b><?= $row->kode_tiket ?></b>
                    </td>

                    <td><?= $row->pelapor ?></td>
                    <td><?= $row->judul ?></td>

                    <td class="text-center">
                        <?= $row->unit ?>
                    </td>

                    <!-- PRIORITAS -->
                    <td class="text-center">
                        <?php
                        $badge = 'secondary';
                        if($row->prioritas == 'Rendah') $badge = 'success';
                        if($row->prioritas == 'Sedang') $badge = 'info';
                        if($row->prioritas == 'Tinggi') $badge = 'warning';
                        if($row->prioritas == 'Urgent') $badge = 'danger';
                        ?>
                        <span class="badge badge-<?= $badge ?> px-3 py-2">
                            <?= $row->prioritas ?>
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td class="text-center">
                        <?php
                        $statusClass = 'secondary';
                        if($row->status == 'Open') $statusClass = 'danger';
                        if($row->status == 'Proses') $statusClass = 'warning';
                        if($row->status == 'Selesai') $statusClass = 'success';
                        ?>
                        <span class="badge badge-<?= $statusClass ?> px-3 py-2">
                            <?= $row->status ?>
                        </span>
                    </td>

                    <td class="text-center">
                        <?= date('d M Y H:i', strtotime($row->tanggal_buat)) ?>
                    </td>

                    <td class="text-center">
                        <button class="btn btn-sm btn-info shadow-sm"
                            data-toggle="modal"
                            data-target="#modalDetail<?= $row->id ?>">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

</div>
<!-- Modal Tambah Tiket -->
<div class="modal fade" id="modalTiket" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            
            <form method="post" action="<?= base_url('helpdesk/simpan') ?>" enctype="multipart/form-data">
                
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-ticket-alt"></i> Buat Tiket Baru
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        &times;
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Unit / Bagian</label>
                        <input type="text" name="unit" class="form-control"
                               value="<?= $this->session->userdata('login_session')['unit'] ?? '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Judul Permasalahan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Masalah</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Prioritas</label>
                        <select name="prioritas" class="form-control">
                            <option value="Rendah">Rendah</option>
                            <option value="Sedang" selected>Sedang</option>
                            <option value="Tinggi">Tinggi</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lampiran (Screenshot)</label>
                        <input type="file" name="lampiran" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Kirim Tiket
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


<?php foreach ($tiket as $row): ?>
<div class="modal fade" id="modalDetail<?= $row->id ?>" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
<hr>
<h6>Timeline Aktivitas</h6>

            <div style="max-height:250px; overflow:auto;">
            <?php 
            $log = $this->Helpdesk_model->get_log($row->id);
            foreach($log as $l): 
            ?>
                <div class="mb-3 p-2 border-left border-primary">
                    <small>
                        <b><?= $l->name ?></b> 
                        (<?= date('d-m-Y H:i', strtotime($l->created_at)) ?>)
                    </small>
                    <br>
                    <span class="badge badge-info"><?= $l->status ?></span>
                    <p><?= $l->keterangan ?></p>
                </div>
            <?php endforeach; ?>
            </div>
<?php 
$progress = 25;
if($row->status == 'Proses') $progress = 60;
if($row->status == 'Selesai') $progress = 100;
?>

<div class="progress mb-3">
  <div class="progress-bar bg-success" 
       role="progressbar" 
       style="width: <?= $progress ?>%">
       <?= $progress ?>%
  </div>
</div>

            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">
                    Detail Tiket - <?= $row->kode_tiket ?>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <p><b>Judul :</b> <?= $row->judul ?></p>
                <p><b>Unit :</b> <?= $row->unit ?></p>
                <p><b>Deskripsi :</b><br><?= $row->deskripsi ?></p>
                <p><b>Status :</b> <?= $row->status ?></p>

                <?php if($row->lampiran): ?>
                    <p><b>Lampiran :</b><br>
                        <a href="<?= base_url('uploads/helpdesk/'.$row->lampiran) ?>" target="_blank">
                            Lihat File
                        </a>
                    </p>
                <?php endif; ?>

                <hr>

                <!-- FORM TINDAK LANJUT -->
                <?php if($this->session->userdata('login_session')['role'] == 'admin'): ?>

                <form method="post" action="<?= base_url('helpdesk/update_status/'.$row->id) ?>">

                    <div class="form-group">
                        <label>Ubah Status</label>
                        <select name="status" class="form-control">
                            <option value="Open">Open</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>

<div class="form-group">
    <label>Catatan IT</label>
    <textarea name="catatan" class="form-control" required></textarea>
</div>

                    <button type="submit" class="btn btn-success">
                        Simpan Perubahan
                    </button>

                </form>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        order: [[5, 'desc']],
        language: {
            search: "Cari Tiket:",
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ tiket",
            paginate: {
                next: "Next",
                previous: "Prev"
            }
        }
    });
});
</script>
