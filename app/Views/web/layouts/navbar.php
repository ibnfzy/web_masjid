<div class="d-grid gap-2">
  <!-- Scrolling Text -->
  <div class="bg-success">
    <marquee direction="left" class="text-white fs-5" scrollamount="5" onmouseover="this.stop();"
      onmouseout="this.start();"> Website ini masih dalam tahap pengembangan dan ini merupakan tampilan preview saja,
      data yang dipakai merupakan data dummy dan tidak merepresentasikan data real.
    </marquee>
  </div>

  <!-- Header -->
  <nav class="navbar navbar-expand-md bg-body-white">
    <div class="container-xl">
      <a class="navbar-brand" href="#">
        <img src="<?= base_url('MASJID.png') ?>" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Lembaga">Lembaga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Layanan">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Inventaris">Inventaris</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Tausiyah">Tausiyah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Laporan Agenda <span class="badge bg-danger">Belum Tersedia</span>
            </a>
            <!-- <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Agenda">Agenda</a>
          </li>
          <li class="nav-item">
            <?php if (session()->get('operator_logged_in')) : ?>
            <a class="nav-link" href="/OperatorPanel">Admin Panel</a>
            <?php else : ?>
            <a class="nav-link" href="/Login/Operator">Login</a>
            <?php endif; ?>
          </li>
        </ul>
        <div class="search-and-icons">
          <form class="d-flex mb-2 me-2" role="search">
            <input class="form-control me-2" type="search" aria-label="Search">
          </form>
        </div>
        <div class="contact-info card hstack col-6 bg-success text-white align-self-end mb-2" id="jadwal">
          <div class="vstack border-end border-light mb-2 mt-2 align-items-center">
            <div>SUBUH</div>
            <div><?= session()->get('jadwal_sholat')['subuh']; ?></div>
          </div>
          <div class="vstack border-end border-light mb-2 mt-2 align-items-center">
            <div>TERBIT</div>
            <div><?= session()->get('jadwal_sholat')['terbit']; ?></div>
          </div>
          <div class="vstack border-end border-light mb-2 mt-2 align-items-center">
            <div>DZUHUR</div>
            <div><?= session()->get('jadwal_sholat')['dzuhur']; ?></div>
          </div>
          <div class="vstack border-end border-light mb-2 mt-2 align-items-center">
            <div>ASHAR</div>
            <div><?= session()->get('jadwal_sholat')['ashar']; ?></div>
          </div>
          <div class="vstack border-end border-light mb-2 mt-2 align-items-center">
            <div>MAGHRIB</div>
            <div><?= session()->get('jadwal_sholat')['maghrib']; ?></div>
          </div>
          <div class="vstack align-items-center mb-2 mt-2">
            <div>ISYA</div>
            <div><?= session()->get('jadwal_sholat')['isya']; ?></div>
          </div>

        </div>

        <div class="contact-info card hstack bg-success text-white align-self-end mb-2" id="jadwal_small">
          <div class="vstack border-bottom border-light mb-2 mt-2 align-items-center">
            <div>SUBUH</div>
            <div><?= session()->get('jadwal_sholat')['subuh']; ?></div>
          </div>
          <div class="vstack border-bottom border-light mb-2 mt-2 align-items-center">
            <div>TERBIT</div>
            <div><?= session()->get('jadwal_sholat')['terbit']; ?></div>
          </div>
          <div class="vstack border-bottom border-light mb-2 mt-2 align-items-center">
            <div>DZUHUR</div>
            <div><?= session()->get('jadwal_sholat')['dzuhur']; ?></div>
          </div>
          <div class="vstack border-bottom border-light mb-2 mt-2 align-items-center">
            <div>ASHAR</div>
            <div><?= session()->get('jadwal_sholat')['ashar']; ?></div>
          </div>
          <div class="vstack border-bottom border-light mb-2 mt-2 align-items-center">
            <div>MAGHRIB</div>
            <div><?= session()->get('jadwal_sholat')['maghrib']; ?></div>
          </div>
          <div class="vstack align-items-center mb-2 mt-2">
            <div>ISYA</div>
            <div><?= session()->get('jadwal_sholat')['isya']; ?></div>
          </div>

        </div>
      </div>
    </div>
  </nav>
</div>