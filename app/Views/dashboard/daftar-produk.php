<?= $this->extend('layouts/main'); ?>

<?= $this->section('css'); ?>
<!--  -->
<?= $this->endSection(); ?>

<?= $this->section('main-header') ?>
Daftar Produk
<?= $this->endSection() ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Toko Pemilik</th>
                            <th>Harga</th>
                            <th>Kode Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $item) {  ?>
                        <?php $tokonama = $toko->where('id_toko', $item["toko_id"])->first(); ?>
                        <tr>
                            <td><?= $item["nama_produk"]; ?></td>
                            <td><?= $tokonama["nama_toko"]; ?></td>
                            <td>Rp. <?= number_format($item["harga_produk"],2,',','.') ?> <br></td>
                            <td><?= $item["kode_produk"]; ?></td>
                            <td width="15%">
                                <div class="btn-group d-flex justify-content-center">
                                    <a href="<?= base_url('/produk/lihat-produk') ?>/<?= $item["id_produk"] ?>" class="btn btn-info btn-sm mr-1">LIHAT</a>
                                    <a href="<?= base_url('/produk/edit-produk') ?>/<?= $item["id_produk"] ?>" class="btn btn-primary btn-sm mr-1">UBAH</a>
                                    <!-- <a href="#" class="btn btn-danger btn-sm">HAPUS</a> -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $item["id_produk"] ?>">
                                        HAPUS
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalhapus<?= $item["id_produk"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus Produk ini ? <br> 
                                            Nama Produk : <?php echo $item["nama_produk"] ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                                        <form action="<?= base_url('/produk/hapus-produk'); ?>/<?= $item["id_produk"]; ?>" method="GET">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js'); ?>
<script>
    $(document).ready( function () {
        $('#example').DataTable();
    } );

    $('#modal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
<?= $this->endSection(); ?>