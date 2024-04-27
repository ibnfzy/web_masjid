<?= $this->extend('panel/base'); ?>

<?= $this->section('content'); ?>

<?php $db = db_connect(); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
  <div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <div class="card-body">Lembaga
          <div class="smal"><?= count($db->table('blog')->where('category', 'lembaga')->get()->getResultArray()) ?>
            Postingan</div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="/Lembaga">Lihat Halaman</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-warning text-white mb-4">
        <div class="card-body text-dark">Layanan
          <div class="small text-dark">
            <?= count($db->table('blog')->where('category', 'layanan')->get()->getResultArray()) ?> Postingan</div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-dark stretched-link" href="/Layanan">Lihat Halaman</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-success text-white mb-4">
        <div class="card-body">Inventaris
          <div class="small"><?= count($db->table('blog')->where('category', 'inventaris')->get()->getResultArray()) ?>
            Postingan</div>
        </div>
        <div class=" card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="/Invetaris">Lihat Halaman</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-danger text-white mb-4">
        <div class="card-body">Tausiyah
          <div class="small"><?= count($db->table('blog')->where('category', 'tausiyah')->get()->getResultArray()) ?>
            Postingan</div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="/Tausiyah">Lihat Halaman</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>