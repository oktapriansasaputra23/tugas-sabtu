<div class="modal fade" id="modalImport">
<div class="modal-dialog">
<div class="modal-content">

<form method="post"
action="<?= base_url('mahasiswa/import_excel') ?>"
enctype="multipart/form-data">

<div class="modal-header">
<h5>Import Data Excel</h5>
</div>

<div class="modal-body">

<input type="file"
name="file_excel"
class="form-control"
required>

</div>

<div class="modal-footer">

<button class="btn btn-success">
Upload
</button>

</div>

</form>

</div>
</div>
</div>