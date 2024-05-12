<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <ul class="list-group mb-4">
                <?php foreach ($alamat as $a) : ?>
                    <li class="list-group-item"><?= esc($a['tipe']); ?></li>
                    <li class="list-group-item"><?= esc($a['alamat']); ?></li>
                    <li class="list-group-item"><?= esc($a['kota']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>