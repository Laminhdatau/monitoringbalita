<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr>



    <div class="row">
        <div class="col-lg-4">

            <?php echo $this->session->flashdata('pesan'); ?>

            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr style="background-color: dodgerblue;" class=" m-0 font-weight-bold text-gray-100">
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>

                <body>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i = $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?= check_access($role['role_id'], $m['id_menu']); ?> data-role="<?= $role['role_id']; ?>" data-menu="<?= $m['id_menu']; ?>">

                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>

</div>