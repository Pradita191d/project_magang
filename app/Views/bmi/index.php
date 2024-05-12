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
                    <h3 class="card-title">Kalkulator BMI</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('bmi/calculate') ?>" method="post">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Berat Badan (kg):</label>
                            <input type="text" class="form-control" name="weight" id="weight" value="<?= old('weight') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="height" class="form-label">Tinggi Badan (cm):</label>
                            <input type="text" class="form-control" name="height" id="height" value="<?= old('height') ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Hitung BMI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>