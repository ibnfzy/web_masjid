<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <a href="/" class="nav-link">
          Lihat Website
        </a>
        <a class="nav-link " href="/OperatorPanel">
          Dashboard
        </a>
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#settingModal">
          Setting Web
        </a>
        <a href="/OperatorPanel/RekeningMasjid" class="nav-link">
          Rekening Masjid
        </a>
        <a href="/OperatorPanel/Corousel" class="nav-link">
          Slider Corousel
        </a>
        <a class="nav-link " href="/OperatorPanel/Lembaga">
          Lembaga
        </a>
        <a class="nav-link " href="/OperatorPanel/Layanan">
          Layanan
        </a>
        <a class="nav-link " href="/OperatorPanel/Inventaris">
          Inventaris
        </a>
        <a class="nav-link " href="/OperatorPanel/Tausiyah">
          Tausiyah
        </a>
        <a class="nav-link " href="/OperatorPanel/Agenda">
          Agenda
        </a>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
          aria-expanded="false" aria-controls="collapseLayouts">
          Keuangan
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="/OperatorPanel/Keuangan/Pemasukan">Pemasukan</a>
            <a class="nav-link" href="/OperatorPanel/Keuangan/Pengeluaran">Pengeluaran</a>
          </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporanCollapse"
          aria-expanded="false" aria-controls="laporanCollapse">
          Laporan Infaq
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="laporanCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="/OperatorPanel/Laporan">Table Laporan</a>
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#laporanModal">Buat Laporan</a>
          </nav>
        </div>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Tanggal Server:</div>
      <?= date('D, d M Y'); ?>
    </div>
  </nav>
</div>

<?php
$db = db_connect();
$getDataMasjid = $db->table('masjid')->get()->getRowArray();
?>

<div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/OperatorPanel/Settings" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="keterangan" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $getDataMasjid['alamat']; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $getDataMasjid['kontak']; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $getDataMasjid['email']; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Trailling Text</label>
            <input type="text" class="form-control" id="trailling_text" name="trailling_text"
              value="<?= $getDataMasjid['trailling_text']; ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/OperatorPanel/Laporan" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="keterangan" class="form-label">Pilih Bulan</label>
            <input type="month" class="form-control" id="tanggal" name="tanggal" required>
          </div>
          <div class="mb-3">
            <label for="nominal" class="form-label">Simpan ?</label>
            <select name="action" id="action" class="form-control" required>
              <option value="download">Download PDF</option>
              <option value="save">Simpan</option>
              <option value="both">Keduanya</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>