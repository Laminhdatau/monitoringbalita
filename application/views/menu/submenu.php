<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr>



    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php echo $this->session->flashdata('message'); ?>

            <?= $this->session->flashdata('massage'); ?>

            <a href="" class="btn btn-primary mb-3" style="background: linear-gradient(to bottom, #0066ff 0%, #0066ff 100%);" data-toggle="modal" data-target="#tambaMenuModal">Tambah Submenu</a>

            <table class="table table-bordered table-striped table-hover center">
                <thead>
                    <tr style="background-color: dodgerblue;" class=" m-0 font-weight-bold text-gray-100">
                        <th>No</th>
                        <th>Title</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <body>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i = $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editMenuModal<?= $sm['id_sub_menu']; ?>"><i class="fa fa-edit"></i></button>


                                <!-- Modal -->
                                <?php foreach ($subMenu as $sm) : ?>
                                    <div class="modal fade" id="editMenuModal<?= $sm['id_sub_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="editMenuModalLabel">Buat Sub Menu</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('menu/edit_submenu'); ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <input type="hidden" name="id_sub_menu" value="<?= $sm['id_sub_menu']; ?>" id="">
                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <input type="text" aria-label="First name" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                                                        </div>
                                                        <hr>
                                                        <div class="input-group">

                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <select name="id_menu" id="id_menu" class="form-control">
                                                                <option value="<?= $sm['id_menu']; ?>">Select Menu</option>
                                                                <?php foreach ($menu as $m) : ?>
                                                                    <option value=" <?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <hr>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <input type="text" aria-label="First name" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                                                        </div>
                                                        <hr>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <input type="text" aria-label="First name" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                                                        </div>
                                                        <hr>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" value="<?= $sm['is_active']; ?>" checked>
                                                                <label class="form-check-table" for="is_active">
                                                                    Active?
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusSubModal<?= $sm['id_sub_menu']; ?>"><i class="fa fa-trash"></i></button>


                                <?php foreach ($subMenu as $sm) : ?>
                                    <div class="modal fade" id="hapusSubModal<?= $sm['id_sub_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusSubModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('menu/hapus_sub_menu/' . $sm['id_sub_menu']); ?>" method="post">
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
<div class="modal fade" id="tambaMenuModal" tabindex="-1" role="dialog" aria-labelledby="tambaMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="tambaMenuModalLabel">Buat Sub Menu</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <input type="text" aria-label="First name" class="form-control" id="title" name="title" placeholder="SubMenu Title">
                    </div>
                    <hr>
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <select name="id_menu" id="id_menu" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <hr>
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <input type="text" aria-label="First name" class="form-control" id="url" name="url" placeholder="SubMenu Url">
                    </div>
                    <hr>
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <input type="text" aria-label="First name" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon">
                    </div>
                    <hr>
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-table" for="is_active">
                                Active?
                            </label>
                        </div>
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