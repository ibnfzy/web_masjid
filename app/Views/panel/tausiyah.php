<?= $this->extend('panel/base'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Kelola Postingan tausiyah</h1>
  <ol class="breadcrumb mb-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Tambah Data</button>
  </ol>
  <div class="card mb-4">
    <div class="card-body">
      <table class="table table-bordered" id="datatables">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Tanggal Posting</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $item) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $item['title'] ?> <img src="<?= base_url('uploads/' . $item['image']); ?>" alt="" width="100"
                class="img-fluid"></td>
            <td><?= $item['created_at'] ?></td>
            <td>
              <button class="btn btn-primary"
                onclick="edit('<?= $item['id'] ?>', '<?= $item['title'] ?>', '<?= $item['content'] ?>', '<?= base_url('uploads/' . $item['image']) ?>')">Edit</button>
              <a href="/OperatorPanel/Tausiyah/Delete/<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" action="/OperatorPanel/Tausiyah" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="file" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" id="file" name="file" accept="image/png,image/jpeg" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" action="/OperatorPanel/Tausiyah/Update" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="id_kelas" id="id_kelas-edit">
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title-edit" name="title" required>
          </div>
          <div class="mb-3">
            <label for="file" class="form-label">Upload Gambar</label>
            <img src="#" alt="image data not found" id="image-edit" class="img-fluid d-block shadow mb-2" width="100">
            <input type="file" class="form-control" id="file-edit" name="file" accept="image/png,image/jpeg">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" id="content-edit" cols="30" rows="10" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
const edit = (id, title, content, image) => {
  $('#id-edit').val(id)
  $('#title-edit').val(title)
  $('#content-edit').val(content)
  $('#image-edit').attr('src', image)
  $('#edit').modal('show')
};
</script>

<?= $this->endSection(); ?>