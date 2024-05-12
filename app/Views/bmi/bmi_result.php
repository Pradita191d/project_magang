<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Hasil BMI Anda</h3>
                </div>
                <div class="card-body">
                    <p class="lead">BMI: <?= $bmi ?></p>
                    <div class="alert alert-info" role="alert">
                        <?php if ($bmi < 18.5) : ?>
                            Anda memiliki berat badan kurang.
                        <?php elseif ($bmi >= 18.5 && $bmi < 25) : ?>
                            Anda memiliki berat badan normal.
                        <?php elseif ($bmi >= 25 && $bmi < 30) : ?>
                            Anda memiliki overweight.
                        <?php else : ?>
                            Anda memiliki obesitas.
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>