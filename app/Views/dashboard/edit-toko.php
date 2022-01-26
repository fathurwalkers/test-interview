<?= $this->extend('layouts/main'); ?>

<?= $this->section('css'); ?>
<!--  -->
<?= $this->endSection(); ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Ubah Data Toko 
            </div>
            <div class="card-body">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-12">

                            <form action="<?= base_url('/toko/update-toko'); ?>/<?= $toko["id_toko"] ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama Toko : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Toko... " name="nama_toko" required autofocus value="<?= $toko["nama_toko"] ?>">
                                    <small class="form-text text-muted">contoh : Gersamata Indah Abadi </small>
                                </div>

                                <div class="row mt-3 mb-4">
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-lg btn-success"> TAMBAH DATA </button>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                        <small class="form-text text-muted">Tekan tombol "TAMBAH DATA" Jika semua data telah benar</small>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js'); ?>
<script type="text/javascript">
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<?= $this->endSection(); ?>