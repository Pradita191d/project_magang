<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Anggota</h2>
            <form action="/anggota/update/<?= $anggota['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3 form-group">
                    <label for="anggota" class="col-sm-2 col-form-label">ID Anggota</label>
                    <div class="col-sm-10">
                        <input type="text" id="no_induk" name="no_induk" class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : '' ?> " value="<?= (old('no_induk')) ? old('no_induk') : $anggota['no_induk'] ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_induk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Anggota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $anggota['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>