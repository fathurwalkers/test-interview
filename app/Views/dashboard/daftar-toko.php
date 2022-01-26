<?= $this->extend('layouts/main'); ?>

<?= $this->section('css'); ?>
<!--  -->
<?= $this->endSection(); ?>

<?= $this->section('main-header') ?>
Daftar Toko 
<?= $this->endSection() ?>

<?php echo $this->section('main-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Toko</th>
                            <th>Pemilik Toko</th>
                            <th>Kode Toko</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($toko as $item) {  ?>
                        <?php $usernama = $user->where('id_user', $item["user_id"])->first(); ?>
                        <tr>
                            <td><?= $item["nama_toko"] ?></td>
                            <td><?= $usernama["nama"] ?></td>
                            <td><?= $item["kode_toko"] ?></td>
                            <td width="15%">
                                <div class="btn-group d-flex justify-content-center">
                                    <a href="#" class="btn btn-info btn-sm mr-1">LIHAT</a>
                                    <a href="#" class="btn btn-primary btn-sm mr-1">UBAH</a>
                                    <!-- <a href="#" class="btn btn-danger btn-sm">HAPUS</a> -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $item["id_toko"] ?>">
                                        HAPUS
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalhapus<?= $item["id_toko"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus Toko ini ? <br> 
                                            Nama Toko : <?php echo $item["nama_toko"] ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                                        <form action="<?= base_url('/toko/hapus-toko'); ?>/<?= $item["id_toko"]; ?>" method="GET">
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