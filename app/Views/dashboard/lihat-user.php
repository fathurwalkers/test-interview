<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-header') ?>
Lihat Data Pengguna (User) 
<?= $this->endSection() ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            Nama Lengkap <br>
                            Username <br>
                            Level <br>
                        </div>
                        <div class="col-3">
                            <?= $user["nama"] ?> <br>
                            <?= $user["username"] ?> <br>
                            <?= $user["level"] ?> <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>