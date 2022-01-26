<?= $this->extend('layouts/main'); ?>

<?= $this->section('css'); ?>
<!--  -->
<?= $this->endSection(); ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Ubah Data Produk
            </div>
            <div class="card-body">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-12">

                            <form action="<?= base_url('/produk/post-update-produk'); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama Produk : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Produk... " name="nama_produk" required autofocus>
                                    <small class="form-text text-muted">contoh : Kopi Kapal Api </small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Harga : </label>
                                    <input type="number" class="form-control" placeholder="Masukkan Harga Produk... " name="harga_produk" required autofocus>
                                    <small class="form-text text-muted">contoh : 23000</small>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <img id="output_image" class="border border-1" width="400px"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Foto : </label>
                                            <input type="file" class="form-control-file" onchange="preview_image(event)" name="gambar_produk">
                                            <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg</small>
                                        </div>
                                    </div>
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