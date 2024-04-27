<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>

<section class="py-3 py-md-5 py-xl-8 ps-1 ps-md-3 ps-xl-4 mx-3">
  <div class="col-8">
    <h1 class="fw-bolder"><?= $data['title']; ?></h1>
    <p class="text-muted">Di posting pada tanggal <?= $data['created_at']; ?></p>
    <span class="badge text-bg-secondary mb-3"><?= $data['category']; ?></span>
    <br>
    <img src="<?= base_url('uploads/' . $data['image']); ?>" class="img-fluid" alt="">

    <div class="mt-3">
      <?= $data['content']; ?>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>