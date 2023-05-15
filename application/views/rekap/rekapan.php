<div class="container-fluid">

    <!-- Page Heading -->
    <center colo>
        <h3><b>
                <p class="text-dark">Data Yang Tersimpan</p>
            </b></h3>
    </center>
    <hr>

    <?php echo $this->session->flashdata('pesan'); ?>
    <a href="" class="btn btn-success ml-2" onclick="printDiv('cetak')"><b>Print</b> <i class='fa fa-print'></i></a>
    <br>
    <br>

    <div class="card shadow mb-4 border-left-secondary">
        
<div id="cetak">
<div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-dark"><p>Register dan Hasil Penimbangan Balita </p></h4>
            <h5 class="m-0 font-weight-bold text-dark"><p>Desa Panggulo Barat Tahun 2023</p></h5>
        </div>


    <div class="card-body">
        
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">
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
                               ";
                        } else {
                            $sekarang = "<td>" . $dsn->berat_badan . " Kg</td>
                                            <td>" . $dsn->tinggi_badan . " Cm</td>
                                            <td>" . $dsn->lingkar_kepala . " Cm</td>
                                            <td>" . $dsn->tgl_periksa . "</td>

                                            <td>" . $dsn->nama_imun . "</td>
                                            <td>" . $dsn->nama_status . "</td>
                                            ";
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
    </div>
</div>

<script> 
                            function printDiv(divName) { 
                                var printContents = document.getElementById(divName).innerHTML; 
                                var originalContents = document.body.innerHTML; 
 
                                document.body.innerHTML = printContents; 
 
                                window.print(); 
 
                                document.body.innerHTML = originalContents; 
                            } 
                        </script> 



<br>
<br>
<!-- <div class="container">

    <center>

        <h4><b>Cek Tumbuh Kembang Anak</b></h4>

    </center>
    <br>
    <center>
        <div class="col-lg-6">

            <div class="input-group">
                <span class="input-group-text m-0 font-weight-bold text-gray-100" style="background-color: dodgerblue;">Silakan di isi</span>
                <input type="text" name="berat_badan" placeholder="BB" class="form-control" required>
                <input type="text" name="tinggi_badan" placeholder="TB" class="form-control" required>
                <input type="text" name="lingkar_kepala" placeholder="LK" class="form-control" required>
            </div>

        </div>
    </center>

</div> -->
<!-- /.container-fluid -->