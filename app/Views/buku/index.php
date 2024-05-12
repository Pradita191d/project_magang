<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <a href="/buku/tambah" class="btn btn-primary mt-3">Tambah Data Buku</a>
      <h2 class="mt-2">Daftar Buku</h2>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($buku as $b) { ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><img src="/img/<?= $b['sampul']; ?>" alt="" class="sampul"></td>
              <td><?= $b['judul']; ?></td>
              <td>
                <a href="/buku/<?= $b['slug']; ?>" class="btn btn-success btn-sm">Detail</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>