<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>

<section class="py-3 py-md-5 py-xl-8 ps-1 ps-md-3 ps-xl-4">
  <div class="col-8">
    <h1 class="fw-bolder">Welcome to Blog Post!</h1>
    <p class="text-muted">Posted on January 1, 2023 by Start Bootstrap</p>
    <span class="badge text-bg-secondary mb-3">New</span> <br>
    <img src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" class="img-fluid" alt="">

    <div class="mt-3">
      Science is an enterprise that should be cherished as an activity of the free human mind. Because it transforms
      who we are, how we live, and it gives us an understanding of our place in the universe.

      The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to
      think that Earth would be unique in that regard. Whether of not the life became intelligent is a different
      question, and we'll see if we find that.

      If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to
      disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.
    </div>
  </div>
</section>

<?= $this->endSection(); ?>