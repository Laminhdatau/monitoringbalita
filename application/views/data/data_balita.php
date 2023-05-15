<div class="container-fluid">

    <!-- Page Heading -->
    
    <!-- <?php
$access = $this->session->userdata('role_id');

if ($access == 3) {
    $tulisan= '<center colo>
        <h3><b>
            <p class="text-dark" id="text-balita">SILAKAN DI ISI DATA BALITA</p>
        </b></h3>
    </center>';
} elseif ($access == 4) {
    $tulisan=  '<center colo>
        <h3><b>
            <p class="text-dark" id="text-balita">Silakan di Validasi Data</p>
        </b></h3>
    </center>';
} else {
    $tulisan=  '<center colo>
    <h3><b>
        <p class="text-dark" id="text-balita">Salah</p>
    </b></h3>
</center>';
}
?> -->
<?= $tulisan; ?>
    

    <hr>


    <div class="card-body">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="background-color: dodgerblue;" class="m-0 font-weight-bold text-gray-100 text-center">
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Ibu</th>
                        <th>Dusun</th>
                        <th>Berat Badan / Kg</th>
                        <th>Tinggi Badan / Cm</th>
                        <th>Lingkar Kepala / Cm</th>
                        <th>Tanggal Periksa</th>
                        <th>imun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $access = $this->session->userdata('role_id');
                    foreach ($data_balita as $dsn) {
                        // var_dump($this->session->userdata('role_id'));
                        // die;

                        if (!empty($dsn->id_history)) {
                            $bl = $dsn->id_history;
                            $bb = $dsn->berat_badan;
                            $tb = $dsn->tinggi_badan;
                            $lk = $dsn->lingkar_kepala;
                            $tp = $dsn->tgl_periksa;
                            $im = $dsn->id_imun;
                            $is = $dsn->id_status;
                            if($is=='3'){
                                $statuss="<button class='btn btn-danger' data-toggle='modal' data-target='#buruk".$bl."'>Buruk</button>";
                            }elseif($is=='2'){
                                $statuss='Baik';
                            }else{
                                $statuss='Normal';
                            }
                            $up = "update3/";
                            $del = "data_balita/delete3/" . $bl . "";
                        } else {
                            $bl = null;
                            $bb = null;
                            $tb = null;
                            $lp = null;
                            $tp = null;
                            $im = null;
                            $is = null;
                            $up = "add3/";
                            $del = "data_balita/#";
                        }
                        switch ($access) {
                            case 4:

                                if ($dsn->id_validasi == 0) {
                                    $tombol1 =
                                        "" . anchor('data_balita/validasi1/' . $bl, "<div class='btn btn-sm btn-success'><i class='fa fa-check'></i></div>") . "";
                                    $tombol2 =
                                        "" . anchor('data_balita/validasi2/' . $bl, "<div class='btn btn-sm btn-danger'><i class='fa fa-times'></i></div>") . "";
                                } else if ($dsn->id_validasi == 1) {
                                    $tombol1 = "valid";
                                    $tombol2 = "";
                                } else {
                                    $tombol1 = "tidak valid";
                                    $tombol2 = "";
                                }
                                break;
                            case 5:
                                $tombol1 = "";
                                $tombol2 = "";
                                if ($dsn->id_validasi == 1) {
                                    $tombol1 = "valid";
                                    $tombol2 = "";
                                } else if ($dsn->id_validasi == 2) {
                                    $tombol1 = "tidak valid";
                                    $tombol2 = "";
                                }
                                break;
                            case 3:
                                if (empty($dsn->id_history)) {
                                    $tombol1 = "" . anchor('data_balita/' . $up, "<div class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></div>") . "";
                                    $tombol2 = "" . anchor($del, "<div class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></div>") . "";
                                } else {
                                    $tombol1 = "" . anchor('data_balita/' . $up . $bl, "<div class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></div>") . "";
                                    $tombol2 = "" . anchor($del, "<div class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></div>") . "";
                                }
                                break;



                            default:
                                $tombol1 = "";
                                $tombol2 = "";
                                if ($dsn->id_validasi == 1) {
                                    $tombol1 = "valid";
                                    $tombol2 = "";
                                } else if ($dsn->id_validasi == 2) {
                                    $tombol1 = "tidak valid";
                                    $tombol2 = "";
                                }
                        }
                        if (empty($dsn->id_history)) {
                            $sekarang = "<td>" . null . "</td>
                                <td>" . null . "</td>
                                <td>" . null . "</td>
                                <td>" . null . "</td>

                                <td>" . null . "</td>
                                <td>" . null . "</td>
                                <td>
                                    
                                                " . $tombol1 . "
                                                " . $tombol2 . "

                                </td>";
                        } else {
                            $sekarang = "<td>" . $dsn->berat_badan . " Kg</td>
                                            <td>" . $dsn->tinggi_badan . " Cm</td>
                                            <td>" . $dsn->lingkar_kepala . " Cm</td>
                                            <td>" . $dsn->tgl_periksa . "</td>

                                            <td>" . $dsn->nama_imun . "</td>
                                            <td>" . $statuss. "</td>
                                            <td>
                                                " . $tombol1 . "
                                                " . $tombol2 . "
                                            </td>";
                        }
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $dsn->nik ?></td>
                            <td><?php echo $dsn->nama_balita ?></td>
                            <td><?php echo $dsn->tgl_lahir ?></td>
                            <td><?php echo $dsn->jenis_kelamin ?></td>
                            <td><?php echo $dsn->nama_ibu ?></td>
                            <td><?php echo $dsn->dusun ?></td>
                            <?= $sekarang ?>

                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach($data_balita as $bb){ ?>
<div class="modal fade" id="buruk<?= $bb->id_history; ?>" tabindex="-1" role="dialog" aria-labelledby="tambaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="tambaModalLabel">Informasi Bagi Balita yg mengalami Status Buruk</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text bg-success"><i class="fas fa-solid fa-arrow-right"></i></span>
                        <h3><p>harus makan makanan yang bergizi</p></h3>
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
<?php } ?>