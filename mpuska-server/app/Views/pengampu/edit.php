<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Data Pengampu &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pengampu/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data Pengampu</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Pengampu</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php foreach ($pengampu as $key => $value) : ?>
                    <form action="<?= site_url('pengampu/update/' . $value->ID_pengampu) ?>" method="POST" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Matakuliah *</label>
                            <select name="kode_matkul" class="form-control <?= isset($errors['kode_matkul']) ? 'is-invalid' : null ?>">
                                <option value="" hidden></option>
                                <?php foreach ($matkul as $key => $mk) : ?>
                                    <option value="<?= $mk->kode_matkul ?>" <?= old('kode_matkul', $value->kode_matkul) == $mk->kode_matkul ? 'selected' : null ?>>
                                        <?= $mk->nama ?>
                                    </option>
                                <?php endforeach ?>
                                <div class="invalid-feedback">
                                    <?= isset($errors['kode_matkul']) ? $errors['kode_matkul'] : null ?>
                                </div>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dosen *</label>
                            <select name="niy_nip" class="form-control <?= isset($errors['niy_nip']) ? 'is-invalid' : null ?>">
                                <option value="" hidden></option>
                                <?php foreach ($dosen as $key => $dos) : ?>
                                    <option value="<?= $dos->niy_nip ?>" <?= old('niy_nip', $value->niy_nip) == $dos->niy_nip ? 'selected' : null ?>>
                                        <?= $dos->nama_depan . " " . $dos->nama_tengah . " " . $dos->nama_belakang ?>
                                    </option>
                                <?php endforeach ?>
                                <div class="invalid-feedback">
                                    <?= isset($errors['niy_nip']) ? $errors['niy_nip'] : null ?>
                                </div>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas *</label>
                            <input type="text" name="kelas" value="<?= old('kelas', $value->kelas) ?>" class="form-control <?= $validation->hasError('kelas') ? 'is-invalid' : null ?>" placeholder="Kelas">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kelas') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tahun Ajaran *</label>
                            <input type="text" name="thn_ajaran" value="<?= old('thn_ajaran', $value->thn_ajaran) ?>" class="form-control <?= $validation->hasError('thn_ajaran') ? 'is-invalid' : null ?>" placeholder="Tahun Ajaran">
                            <div class="invalid-feedback">
                                <?= $validation->getError('thn_ajaran') ?>
                            </div>
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