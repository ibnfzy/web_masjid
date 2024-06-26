<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>

<!-- Corousel -->
<div class="owl-carousel owl-theme container-fluid mb-lg-5" id="carousel1">
  <?php foreach ($corousel as $item) : ?>
  <div class="item">
    <img src="<?= base_url('uploads/' . $item['image']); ?>" alt="">
  </div>
  <?php endforeach ?>
</div>

<!-- Informasi Masjid -->

<div class="bg-success p-lg-3">
  <div class="container text-center mt-5">
    <div class="alert alert-light align-items-start" role="alert" id="informasi">
      <div class="col informasi hstack gap-3">
        <i class="fa-solid fa-mosque fs-1 text-success"></i>
        <div class="vstack align-items-start">
          <div style="font-weight: bold; font-size: large;">MASJID AL ITTIHAD</div>
          <div style="font-weight: lighter; font-size: large;">Jl. Toddopuli 7</div>
        </div>
      </div>
      <div class="col informasi owl-carousel owl-theme" id="carouselx2" style="width: 30px;">

        <?php foreach ($dataInformasi as $item) : ?>
        <div class="item hstack gap-3">
          <img src="<?= base_url('uploads/' . $item['image']) ?>" alt="" style="width: auto; height: 50px;">
          <div class="vstack align-items-start">
            <div style="font-weight: bold; font-size: large;"></div>
            <div style="font-weight: bold; font-size: large;"><?= substr($item['title'], 0, 20) . '...' ?></div>
            <a style="font-weight: lighter; font-size: large; text-decoration:none; color: gray;" href="
            <?php if ($item['category'] == 'agenda') : ?>
                <?= base_url('Agenda/' . $item['id']); ?>
              <?php else : ?>
                <?= base_url('Tausiyah/' . $item['id']); ?>
              <?php endif; ?>">Baca Selengkapnya</a>
          </div>
        </div>
        <?php endforeach ?>

      </div>
      <div class="col informasi hstack gap-3">
        <i class="fa-solid fa-phone fs-1"></i>
        <div class="vstack align-items-start">
          <div style="font-weight: bold; font-size: large;">Pusat Info Masjid</div>
          <div style="font-weight: lighter; font-size: large;">+62 819-1188-4342</div>
        </div>
      </div>
    </div>
  </div>
  <hr size="6" color="#ffff00">
  <div class="card">
    <div class="card-title">
      <h1 class="text-center text-success">Laporan Infaq</h1>
    </div>
    <div class="row m-2">
      <div class="col-8">
        <table class="table">
          <thead>
            <tr>
              <th class="text-success">JUMLAH</th>
              <th>TGL</th>
              <th>DARI/KETERANGAN</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($infaq as $item) : ?>
            <tr>
              <td class="text-success col-2">Rp. <?= number_format($item['nominal'], 0, ',', '.'); ?></td>
              <td class="col-2"><?= $item['tanggal']; ?></td>
              <td><?= $item['keterangan']; ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="col-4 vstack">
        LAPORAN SALDO DANA INFAQ
        <span class="fs-4" style="font-weight: bold;">SALDO : <span class="text-success float-end">Rp.
            <?= number_format($total, 0, ',', '.'); ?></span></span>
        Salurkan Infaq Anda melalui rekening berikut
        <hr>
        <div class="card bg-success p-2">
          <div class="owl-carousel owl-theme" id="carousel3">
            <div class="item hstack gap-3">
              <img src="<?= base_url('MASJID.png') ?>" alt="" style="width: auto; height: 50px;">
              <div class="vstack align-items-start">
                <div style="font-weight: bold; font-size: large; color:white;">BRI</div>
                <div style="font-weight: lighter; font-size: large; text-decoration:none; color: white;">1234567890
                  A/N TEST
                </div>
              </div>
            </div>

            <div class="item hstack gap-3">
              <img src="<?= base_url('MASJID.png') ?>" alt="" style="width: auto; height: 50px;">
              <div class="vstack align-items-start">
                <div style="font-weight: bold; font-size: large; color:white;">BRI</div>
                <div style="font-weight: lighter; font-size: large; text-decoration:none; color: white;">1234567890
                  A/N TEST
                </div>
              </div>
            </div>

            <div class="item hstack gap-3">
              <img src="<?= base_url('MASJID.png') ?>" alt="" style="width: auto; height: 50px;">
              <div class="vstack align-items-start">
                <div style="font-weight: bold; font-size: large; color:white;">BRI</div>
                <div style="font-weight: lighter; font-size: large; text-decoration:none; color: white;">1234567890
                  A/N TEST
                </div>
              </div>
            </div>

          </div>
        </div>
        <br>
        <a href="#" class="btn btn-outline-success col-6 rounded-0" style="align-self: self-end;"
          title="Laporan belum tersedia">Lihat Laporan</a>

      </div>
    </div>
  </div>

</div>

<!-- Blog 5 - Bootstrap Brain Component -->
<section class="bsb-blog-5 py-3 py-md-5 py-xl-8">

  <div class="container overflow-hidden">
    <div class="row gy-4 gy-md-5 gx-xl-6 gy-xl-6 gx-xxl-9 gy-xxl-9">
      <?php foreach ($lembaga as $item) : ?>
      <div class="col-12 col-lg-4">
        <article>
          <div class="card border-0 bg-transparent">
            <figure class="card-img-top mb-4 overflow-hidden bsb-overlay-hover">
              <a href="<?= base_url('Lembaga/' . $item['id']) ?>">
                <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                  src="<?= base_url('uploads/' . $item['image']) ?>" alt="Living">
              </a>
              <figcaption>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                  class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                  <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
                <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
              </figcaption>
            </figure>
            <div class="card-body m-0 p-0">
              <div class="entry-header mb-3">
                <ul class="entry-meta list-unstyled d-flex mb-3">
                  <li>
                    <a class="d-inline-flex px-2 py-1 link-primary text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-2 text-decoration-none fs-7"
                      href="#!"><?= ucwords($item['category']); ?></a>
                  </li>
                </ul>
                <h2 class="card-title entry-title h4 m-0">
                  <a class="link-dark text-decoration-none" href="#!"><?= substr($item['title'], 0, 20) . '...' ?></a>
                </h2>
              </div>
            </div>
            <div class="card-footer border-0 bg-transparent p-0 m-0">
              <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                <li>
                  <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center" href="#!">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                      class="bi bi-calendar3" viewBox="0 0 16 16">
                      <path
                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                      <path
                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                    <span class="ms-2 fs-7"><?= $item['created_at']; ?></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>
      <?php endforeach ?>

    </div>
  </div>

</section>

<?= $this->endSection(); ?>