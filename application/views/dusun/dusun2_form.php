<div class="container-fluid">

    <div class="cal lg-6">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-fw fa-duotone fa-id-card"></i> Form Daftar Balita
        </div>

        <form method="post" action="<?php echo base_url('dusun2/add_aksi1') ?>">
            <div class="form-group">
                <label>Nik</label>
                <input type="text" name="nik" placeholder="masukan nik" class="form-control">
                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Nama Balita</label>
                <input type="text" name="nama_balita" placeholder="masukan nama balita" class="form-control">
                <?= form_error('nama_balita', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Tgl Lahir</label>
                <input type="date" name="tgl_lahir" placeholder="masukan tgl lahir" class="form-control">
                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="">
                    <option value="">masukan jenis kelamin</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" placeholder="masukan nama ibu" class="form-control">
                <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="form-group">
                    <label>Dusun</label>
                    <select class="form-control" name="dusun" id="">
                        <option value="">masukan dusun</option>
                        <option value="2">Dusun 2</option>
                    </select>
                    <?= form_error('dusun', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

</div>