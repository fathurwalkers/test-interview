<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-header') ?>
Header
<?= $this->endSection() ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Card Header
            </div>
            <div class="card-body">
                Card Body
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>