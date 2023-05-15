<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr>



    <div class="row">
        <div class="col-lg-6">
            <?php echo $this->session->flashdata('message'); ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('massage'); ?>

            <a href="" class="btn btn-primary mb-3" style="background: linear-gradient(to bottom, #0066ff 0%, #0066ff 100%);" data-toggle="modal" data-target="#tambaModal">Tambah Menu</a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr style="background-color: dodgerblue;" class=" m-0 font-weight-bold text-gray-100">
                        <th>No</th>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <body>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i = $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?= $m['id_menu']; ?>"><i class="fa fa-edit"></i></button>


                                <!-- Modal edit -->
                                <?php foreach ($menu as $m) : ?>
                                    <div class="modal fade" id="editModal<?= $m['id_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="editModalLabel">Edit Menu</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('menu/edit_menu'); ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <input type="hidden" name="id_menu" value="<?= $m['id_menu']; ?>" id="">
                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <input type="text" aria-label="First name" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?= $m['id_menu']; ?>"><i class="fa fa-trash"></i></button>


                                <?php foreach ($menu as $m) : ?>
                                    <div class="modal fade" id="hapusModal<?= $m['id_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('menu/hapus_menu/' . $m['id_menu']); ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <h3>Apakah Anda Yakin ?</h3>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>



                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="tambaModal" tabindex="-1" role="dialog" aria-labelledby="tambaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="tambaModalLabel">Buat Menu</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <input type="text" aria-label="First name" class="form-control" id="menu" name="menu" placeholder="Isi Nama Menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>