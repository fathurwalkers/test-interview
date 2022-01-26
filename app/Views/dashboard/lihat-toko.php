<?= $this->extend('layouts/main'); ?>

<?= $this->section('main-header') ?>
Lihat Data Produk 
<?= $this->endSection() ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="<?= base_url('img/produk') ?>/<?= $produk["gambar_produk"] ?>" alt="" width="250px">
                        </div>
                    </div>
                    <?php $tokonama = $toko->where('id_toko', $produk["toko_id"])->first(); ?>
                    <div class="row">
                        <div class="col-3">
                            Nama Toko <br>
                            Pemilik Toko <br>
                            Kode Toko <br>
                        </div>
                        <div class="col-3">
                            <?= $produk["nama_produk"] ?> <br>
                            Rp. <?= number_format($produk["harga_produk"],2,',','.') ?> <br>
                            <?= $tokonama["nama_toko"] ?> <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>