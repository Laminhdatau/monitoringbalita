<div class="container-fluid">
    
    <div class="col-lg-4">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-duotone fa-id-card"></i> Form Daftar Balita
    </div>
        <form method="post" action="<?php echo base_url('data_balita/add_aksi3') ?>">
        <br>
            <div class="form-group">
                <select class="form-control" name="id_balita" id="" required>
                    <option value="">== Pilih Balita ==</option>
                    <?php foreach ($ba as $s) { ?>
                        <option value="<?= $s->id_balita ?>"><?= $s->nama_balita ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group">
            <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-4" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Berat Badan</i></span>
                <input type="text" name="berat_badan" placeholder="Kg" class="form-control ml-3" required>
                <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <br>
            <div class="input-group">
            <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-4" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Tinggi Badan</i></span>
                <input type="text" name="tinggi_badan" placeholder="Cm" class="form-control ml-2" required>
                <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <br>
            <div class="input-group">
            <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-4" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Lingkar Kepala</i></span>
                <input type="text" name="lingkar_kepala" placeholder="Cm" class="form-control" required>
                <?= form_error('lingkar_kepala', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <br>
            <div class="input-group">
            <span class="input-group-text m-0 font-weight-bold text-gray-100 mr-5" style="background: linear-gradient(to left, #cc66ff 0%, #3399ff 28%);">Imun</i></span>
                <select class="form-control ml-5" name="id_imun" id="" required>
                    <option value="">== Pilih Imun ==</option>
                    <?php foreach ($imu as $s) { ?>
                        <option value="<?= $s->id_imun ?>"><?= $s->nama_imun ?></option>
                    <?php } ?>
                </select>
                <?= form_error('id_imun', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>