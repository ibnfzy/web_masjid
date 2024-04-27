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
        <!-- <a href="/OperatorPanel/Settings" class="nav-link">
          Setting Web
        </a> -->
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
        <div class="sb-sidenav-menu-heading text-white">Fitur dibawah belum final dan akan berubah kedepannya untuk
          menyesuaikan
          data</div>
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
        <a class="nav-link " href="#">
          Laporan Infaq <span class="badge bg-danger">Belum Tersedia</span>
        </a>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Tanggal Server:</div>
      <?= date('D, d M Y'); ?>
    </div>
  </nav>
</div>