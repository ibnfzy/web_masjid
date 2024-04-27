<?= $this->extend('panel/base'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Kelola Rekening Masjid</h1>
  <ol class="breadcrumb mb-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Tambah Data</button>
  </ol>
  <div class="card mb-4">
    <div class="card-body">
      <table class="table table-bordered" id="datatables">
        <thead>
          <tr>
            <th>#</th>
            <th>NAMA BANK</th>
            <th>NOMOR REKENING</th>
            <th>ATAS NAMA</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $key => $item) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $item['nama_bank'] ?> (<?= $item['kode_bank'] ?>) </td>
            <td><?= $item['nomor_rekening'] ?></td>
            <td><?= $item['atas_nama'] ?></td>
            <td>
              <button class="btn btn-primary"
                onclick="edit('<?= $item['id'] ?>', '<?= $item['nama_bank'] ?>', '<?= $item['kode_bank'] ?>', '<?= $item['nomor_rekening'] ?>', '<?= $item['atas_nama'] ?>')">Edit</button>
              <a href="/OperatorPanel/RekeningMasjid/Delete/<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/OperatorPanel/RekeningMasjid" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Nama Bank</label>
            <input type="text" class="form-control" id="nama_bank" name="nama_bank" list="datalist_bank" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Kode Bank</label>
            <input type="text" class="form-control" id="kode_bank" name="kode_bank" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Nomor Rekening</label>
            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Atas Nama</label>
            <input type="text" class="form-control" id="atas_nama" name="atas_nama" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
      <form action="/OperatorPanel/RekeningMasjid/Update" method="post">
        <input type="hidden" name="id" id="id-edit">
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Nama Bank</label>
            <input type="text" class="form-control" id="nama_bank-edit" name="nama_bank" list="datalist_bank" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Kode Bank</label>
            <input type="text" class="form-control" id="kode_bank-edit" name="kode_bank" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Nomor Rekening</label>
            <input type="text" class="form-control" id="nomor_rekening-edit" name="nomor_rekening" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Atas Nama</label>
            <input type="text" class="form-control" id="atas_nama-edit" name="atas_nama" required>
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

<datalist id="datalist_bank">
  <option value="Bank Central Asia (BCA)">
  <option value="Bank Mandiri">
  <option value="Bank Rakyat Indonesia (BRI)">
  <option value="Bank Negara Indonesia (BNI)">
  <option value="Bank Syariah Indonesia (BSI)">
</datalist>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
const edit = (id, nama_bank, kode_bank, nomor_rekening, atas_nama) => {
  $('#id-edit').val(id)
  $('#nama_bank-edit').val(nama_bank)
  $('#kode_bank-edit').val(kode_bank)
  $('#nomor_rekening-edit').val(nomor_rekening)
  $('#atas_nama-edit').val(atas_nama)
  $('#edit').modal('show')
};
</script>

<?= $this->endSection(); ?>