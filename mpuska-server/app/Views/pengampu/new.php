<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Pengampu &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pengampu/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Pengampu</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Data Pengampu Baru</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php $errors = session()->getFlashdata('errors') ?>
                <form action="<?= site_url('pengampu/store') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Matakuliah *</label>
                        <select name="kode_matkul" class="form-control <?= isset($errors['kode_matkul']) ? 'is-invalid' : null ?>">
                            <option value="" hidden></option>
                            <?php foreach ($matkul as $key => $value) : ?>
                                <option value="<?= $value->kode_matkul ?>" <?= old('kode_matkul') == $value->kode_matkul ? 'selected' : null ?>>
                                    <?= $value->nama ?>
                                </option>
                            <?php endforeach ?>
                            <div class="invalid-feedback">
                                <?= isset($errors['kode_matkul']) ? $errors['kode_matkul'] : null ?>
                            </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dosen *</label>
                        <select name="niy" class="form-control <?= isset($errors['niy']) ? 'is-invalid' : null ?>">
                            <option value="" hidden></option>
                            <?php foreach ($dosen as $key => $value) : ?>
                                <option value="<?= $value->niy ?>" <?= old('niy') == $value->niy ? 'selected' : null ?>>
                                    <?= $value->nama_depan . " " . $value->nama_tengah . " " . $value->nama_belakang ?>
                                </option>
                            <?php endforeach ?>
                            <div class="invalid-feedback">
                                <?= isset($errors['niy']) ? $errors['niy'] : null ?>
                            </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas *</label>
                        <input type="text" name="kelas" value="<?= old('kelas') ?>" class="form-control <?= isset($errors['kelas']) ? 'is-invalid' : null ?>" placeholder="Kelas">
                        <div class="invalid-feedback">
                            <?= isset($errors['kelas']) ? $errors['kelas'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran *</label>
                        <input type="text" name="thn_ajaran" value="<?= old('thn_ajaran') ?>" class="form-control <?= isset($errors['thn_ajaran']) ? 'is-invalid' : null ?>" placeholder="Tahun Ajaran">
                        <div class="invalid-feedback">
                            <?= isset($errors['thn_ajaran']) ? $errors['thn_ajaran'] : null ?>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>