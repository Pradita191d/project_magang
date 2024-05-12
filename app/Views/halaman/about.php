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
            <h2>About Us</h2>
            <p>Ini adalah website resmi milik Dita's Library.</p>

            <h2>Di perpustakaan kami tersedia: </h2>

            <ul>
                <?php foreach ($sedia as $item) : ?>
                    <li><?= esc($item); ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>