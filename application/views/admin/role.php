<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr>



    <div class="row">
        <div class="col-lg-4">
            <?php echo $this->session->flashdata('pesan'); ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('massage'); ?>

            <a href="" class="btn btn-primary mb-3" style="background: linear-gradient(to bottom, #0066ff 0%, #0066ff 100%);" data-toggle="modal" data-target="#tambaRoleModal">Tambah Role</a>

            <table class="table table-bordered table-striped table-hover">
                <thead style="background-color: dodgerblue;" class=" m-0 font-weight-bold text-gray-100 text-center">
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <body>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i = $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleaccess/') . $r['role_id']; ?>" class="badge badge-warning mr-3"><i class="fas fa-fw fa-solid fa-check"></i></a>

                                <button type="button" class="badge badge-primary mr-3" data-toggle="modal" data-target="#editModal<?= $r['role_id']; ?>">
                                    <i class="fa-fw fa fa-edit"></i>
                                </button>


                                <!-- Modal edit -->
                                <?php foreach ($role as $r) : ?>
                                    <div class="modal fade" id="editModal<?= $r['role_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="editModalLabel">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('admin/edit_role'); ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <input type="hidden" name="role_id" value="<?= $r['role_id']; ?>" id="">
                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <input type="text" aria-label="First name" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
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


                                <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal<?= $r['role_id']; ?>"><i class="fa-fw fa fa-trash"></i></button>


                                <!-- Modal hapus -->
                                <?php foreach ($role as $r) : ?>
                                    <div class="modal fade" id="hapusModal<?= $r['role_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="hapusModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('admin/hapus_role/' . $r['role_id']); ?>" method="post">
                                                    <div class="modal-body">
                                                        <h3>Apakah anda yakin ingin menghapus role ini ? </h3>
                                                        <input type="hidden" name="role" id="role" value="<?= $r['role_id']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-primary">Yaa</button>
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
<div class="modal fade" id="tambaRoleModal" tabindex="-1" role="dialog" aria-labelledby="tambaRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="tambaRoleModalLabel">Buat Role</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <input type="text" aria-label="First name" class="form-control" id="role" name="role" placeholder="Isi Nama Role">
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

<!-- Modal -->