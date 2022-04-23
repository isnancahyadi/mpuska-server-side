<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Data Mahasiswa &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('mahasiswa/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data Mahasiswa</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Mahasiswa</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php foreach ($mahasiswa as $key => $value) : ?>
                    <form action="<?= site_url('mahasiswa/update/' . $value->nim) ?>" method="POST" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>No. Induk Mahasiswa *</label>
                            <input type="text" name="nim" value="<?= old('nim', $value->nim) ?>" class="form-control <?= $validation->hasError('nim') ? 'is-invalid' : null ?>" placeholder="NIM">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nim') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama Depan *</label>
                                <input type="text" name="nama_depan" value="<?= old('nama_depan', $value->nama_depan) ?>" class="form-control" placeholder="Nama Depan">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nama Tengah</label>
                                <input type="text" name="nama_tengah" value="<?= old('nama_tengah', $value->nama_tengah) ?>" class="form-control" placeholder="Nama Tengah">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nama Belakang</label>
                                <input type="text" name="nama_belakang" value="<?= old('nama_belakang', $value->nama_belakang) ?>" class="form-control" placeholder="Nama Belakang">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Jenis Kelamin *</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="1" <?php if ($value->gender == '1') { ?> checked <?php } ?>>
                                    <label class="form-check-label">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="0" <?php if ($value->gender == '0') { ?> checked <?php } ?>>
                                    <label class="form-check-label">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="number" name="no_hp" value="<?= old('no_hp', $value->no_hp) ?>" class="form-control" placeholder="No. HP">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" value="<?= old('email', $value->email) ?>" class="form-control" placeholder="Email">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>