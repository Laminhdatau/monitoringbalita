<div class="container-fluid">

    <?php
    foreach ($data_balita as $dsn) {
        if (!empty($dsn->id_balita)) {
            $ih =  $dsn->id_history;
            $bl =  $dsn->id_balita;
            $bb = $dsn->berat_badan;
            $tb = $dsn->tinggi_badan;
            $lk = $dsn->lingkar_kepala;
            $tp = $dsn->tgl_periksa;
            $im = $dsn->id_imun;
            $is = $dsn->id_status;
            $up = "update_aksi3/";
        } else {
            $ih = null;
            $bl =  null;
            $bb = null;
            $tb = null;
            $lp = null;
            $tp = null;
            $im = null;
            $is = null;
            $up = "add_aksi3/";
        }


    ?>
        <div class="col-lg-4">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-fw fa-duotone fa-id-card"></i> Form Update Daftar Balita
            </div>
            <br>
            <form method="post" action="<?php echo base_url('data_balita/' . $up . $ih); ?>">
                <div class="input-group">
                    <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-4" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Berat Badan</i></span>
                    <input type="hidden" name="id_balita" value="<?= $bl; ?>">
                    <input type="float" name="berat_badan" class="form-control ml-3" placeholder="Kg" value="<?= $bb;  ?>">
                </div>
                <br>
                <div class="input-group">
                <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-4" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Tinggi Badan</i></span>
                    <input type="float" aria-label="First name" name="tinggi_badan" class="form-control ml-2" placeholder="Cm" value="<?= $tb; ?>">
                </div>
                <br>
                <div class="input-group">
                <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-4" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Lingkar Kepala</i></span>
                    <input type="float" name="lingkar_kepala" class="form-control" placeholder="Cm" value="<?= $lk; ?>">
                </div>
                <br>
                <div class="input-group">
                <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-5" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Imun</i></span>
                    <select class="form-control ml-5" name="id_imun">
                        <?php foreach ($imu as $s) { ?>
                            <option value="<?= $s->id_imun ?>" <?= ($s->id_imun == $im) ? 'selected' : '' ?>><?= $s->nama_imun ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    <?php } ?>
</div>