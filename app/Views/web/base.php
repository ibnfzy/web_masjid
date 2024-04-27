<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/masjid.png">
  <title>WEB Masjid Jami Al Ittihad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/blogs/blog-5/assets/css/blog-5.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <?php
  $db = db_connect();
  $getLayanan = $db->table('blog')->where('category', 'layanan')->get(6)->getResultArray();
  $getDataMasjid = $db->table('masjid')->get()->getRowArray();
  $kontak = $getDataMasjid['kontak'];
  $formattedKontak = preg_replace('/[^0-9]/', '', $kontak);
  if (substr($formattedKontak, 0, 2) != '62') {
    $formattedKontak = '62' . $formattedKontak;
  }
  ?>


  <?= $this->include('web/layouts/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <footer class="bg-success p-lg-3 text-white mt-auto" id="end">
    JULTDEV 2024
  </footer>

  <div class="position-fixed bottom-0 end-0 p-3 mb-3">
    <a class="btn btn-success" type="button" data-bs-toggle="dropdown" aria-expanded="false"
      onclick="window.scrollBy({ top: 400, behavior: 'smooth' })">
      <i class="fab fa-whatsapp fa-2xl"></i>
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="https://wa.me/<?= $formattedKontak ?>" target="_blank" rel="noopener">Hubungi
          Langsung</a>
      </li>

      <?php foreach ($getLayanan as $item) : ?>
      <?php $text = urlencode('Assalumailaikum, saya mau bertanya mengenai layanan ' . $item['title']); ?>
      <li><a class="dropdown-item" href="https://wa.me/<?= $formattedKontak ?>?text=<?= $text ?>" target="_blank"
          rel="noopener">Tanya
          tentang layanan <?= substr($item['title'], 0, 20) . '...' ?></a></li>
      <?php endforeach ?>
    </ul>
  </div>

  <!-- SCRIPT -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
    integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="<?= base_url() ?>assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

</body>

</html>