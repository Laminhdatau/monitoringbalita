<div class="container-fluid">

<div class="col-lg-6">    
<div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-duotone fa-id-card"></i> Form Update Daftar Balita
    </div>

    <?php foreach ($dusun3 as $dsn) : ?>
        <form method="post" action="<?php echo base_url('dusun3/update_aksi2') ?>">
            <div class="form-group">
                <label>Nik</label>
                <input type="hidden" name="id_balita" value="<?php echo $dsn->id_balita ?>">
                <input type="text" name="nik" class="form-control" value="<?php echo $dsn->nik ?>">
            </div>
            <div class="form-group">
                <label>Nama Blita</label>
                <input type="text" name="nama_balita" class="form-control" value="<?php echo $dsn->nama_balita ?>">
            </div>
            <div class="form-group">
                <label>Tgl Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dsn->tgl_lahir ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" value="<?php echo $dsn->jenis_kelamin ?>">
                    <option value="">masukan jenis kelamin</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" value="<?php echo $dsn->nama_ibu ?>">
            </div>
            <div class="form-group">
                <label>Dusun</label>
                <select class="form-control" name="dusun" value="<?php echo $dsn->dusun ?>">
                    <option value="">masukan dusun</option>
                    <option value="3">Dusun 3</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
</div>
    <?php endforeach; ?>
</div>