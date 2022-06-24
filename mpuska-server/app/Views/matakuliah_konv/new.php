<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Matakuliah Konversi &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('matakuliahkonv/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Matakuliah Konversi</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Data Matakuliah Konversi Baru</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php $errors = session()->getFlashdata('errors') ?>
                <form action="<?= site_url('matakuliahkonv/store') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Kode *</label>
                        <input type="text" name="kode_matkul" value="<?= old('kode_matkul') ?>" class="form-control <?= isset($errors['kode_matkul']) ? 'is-invalid' : null ?>" placeholder="Kode Matakuliah">
                        <div class="invalid-feedback">
                            <?= isset($errors['kode_matkul']) ? $errors['kode_matkul'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Matakuliah *</label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : null ?>" placeholder="Nama Matakuliah">
                        <div class="invalid-feedback">
                            <?= isset($errors['nama']) ? $errors['nama'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Semester *</label>
                        <input type="text" name="semester" value="<?= old('semester') ?>" class="form-control <?= isset($errors['semester']) ? 'is-invalid' : null ?>" placeholder="Semester">
                        <div class="invalid-feedback">
                            <?= isset($errors['semester']) ? $errors['semester'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>SKS *</label>
                        <input type="number" name="sks" value="<?= old('sks') ?>" class="form-control <?= isset($errors['sks']) ? 'is-invalid' : null ?>" placeholder="SKS">
                        <div class="invalid-feedback">
                            <?= isset($errors['sks']) ? $errors['sks'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Program Studi *</label>
                        <input type="text" name="prodi" value="<?= old('prodi') ?>" class="form-control <?= isset($errors['prodi']) ? 'is-invalid' : null ?>" placeholder="Program Studi">
                        <div class="invalid-feedback">
                            <?= isset($errors['prodi']) ? $errors['prodi'] : null ?>
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