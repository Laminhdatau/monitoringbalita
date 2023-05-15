<div class="container-fluid">

    <!-- Page Heading -->

    <center colo>
        <h6><b>
                <p class="text-dark">SILAKAN DAFTARKAN BALITA
                <p><?= $title; ?></p>
                </p>
            </b></h6>
    </center>
    <hr>

    <!-- DataTales Example -->
    <?php echo $this->session->flashdata('pesan'); ?>

    <?php echo anchor('dusun3/add2', '<button class="btn btn-primary mb-3" style="background: linear-gradient(to bottom, #0066ff 0%, #0066ff 100%);"><i class="fas fa-fw fa-plus"></i> Tambah Balita</button>') ?>

    <div class="card shadow mb-4 border-left-secondary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dusun III</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background-color: dodgerblue;" class=" m-0 font-weight-bold text-gray-100 text-center">
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Ibu</th>
                            <th>Dusun</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dusun3 as $dsn) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $dsn->nik ?></td>
                                <td><?php echo $dsn->nama_balita ?></td>
                                <td><?php echo $dsn->tgl_lahir ?></td>
                                <td><?php echo $dsn->jenis_kelamin ?></td>
                                <td><?php echo $dsn->nama_ibu ?></td>
                                <td><?php echo $dsn->dusun ?></td>
                                <td>
                                    <?php echo anchor('dusun3/update2/' . $dsn->id_balita, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'); ?>

                                    <?php echo anchor('dusun3/delete2/' . $dsn->id_balita, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->