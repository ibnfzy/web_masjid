<?= $this->extend('panel/base'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4">
  <h1 class="mt-4">Kelola Laporan Tersimpan</h1>
  <ol class="breadcrumb mb-4">
  </ol>
  <div class="card mb-4">
    <div class="card-body">
      <table class="table table-bordered" id="datatables">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $item) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $item['month'] ?></td>
            <td>
              <a class="btn btn-danger" href="/OperatorPanel/Laporan/<?= $item['month'] ?>">Download PDF</a>
              <a href="/OperatorPanel/Laporan/Delete/<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>