<?= $this->extend('panel/base'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Kelola data keuangan</h1>
  <ol class="breadcrumb mb-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Tambah Data</button>
  </ol>
  <div class="card mb-4">
    <div class="card-body">
      <table class="table table-bordered" id="datatables">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nominal</th>
            <th>Jenis</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $item) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $item['tanggal'] ?> </td>
              <td><?= $item['keterangan'] ?> </td>
              <td>Rp<?= number_format($item['nominal'], 0, ',', '.') ?> </td>
              <td><?= $item['jenis'] ?></td>
              <td>
                <button class="btn btn-primary" onclick="edit('<?= $item['id'] ?>', '<?= $item['tanggal'] ?>', '<?= $item['keterangan'] ?>', '<?= $item['nominal'] ?>', '<?= $item['jenis'] ?>')">Edit</button>
                <a href="/OperatorPanel/Infaq/Delete/<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
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
      <form action="/OperatorPanel/Infaq" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="keterangan" class="form-label">Judul</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="nominal" class="form-label">Nominal (Rp)</label>
            <input type="text" class="form-control" id="nominal" name="nominal" required>
          </div>
          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis (Pemasukan/Pengeluaran)</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="pemasukan">1. Pemasukan</option>
              <option value="pengeluaran">2. Pengeluaran</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">
              <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </label>
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
      <form action="/OperatorPanel/Infaq/Update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id-edit">
        <div class="modal-body">
          <div class="mb-3">
            <label for="keterangan" class="form-label">Judul</label>
            <input type="text" class="form-control" id="keterangan-edit" name="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="nominal" class="form-label">Nominal (Rp)</label>
            <input type="text" class="form-control" id="nominal-edit" name="nominal" required>
          </div>
          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis (Pemasukan/Pengeluaran)</label>
            <select name="jenis" id="jenis-edit" class="form-control">
              <option value="pemasukan">1. Pemasukan</option>
              <option value="pengeluaran">2. Pengeluaran</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">
              <input type="date" class="form-control" id="tanggal-edit" name="tanggal" required>
            </label>
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
  const edit = (id, tanggal, keterangan, nominal, jenis) => {
    $('#id-edit').val(id)
    $('#tanggal-edit').val(tanggal)
    $('#keterangan-edit').val(keterangan)
    $('#nominal-edit').val(nominal)
    $('#jenis-edit option').each(function() {
      if ($(this).val() == jenis) {
        $(this).attr('selected', '');
      }
    });
    $('#edit').modal('show')
  };
</script>

<?= $this->endSection(); ?>