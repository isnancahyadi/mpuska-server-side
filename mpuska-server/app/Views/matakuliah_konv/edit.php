<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Data Matakuliah Konversi &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('matakuliahkonv/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data Matakuliah Konversi</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Matakuliah Konversi</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php foreach ($matkul as $key => $value) : ?>
                    <form action="<?= site_url('matakuliahkonv/update/' . $value->kode_matkul) ?>" method="POST" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Kode *</label>
                            <input type="text" name="kode_matkul" value="<?= old('kode_matkul', $value->kode_matkul) ?>" class="form-control <?= $validation->hasError('kode_matkul') ? 'is-invalid' : null ?>" placeholder="Kode Matakuliah">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode_matkul') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Matakuliah *</label>
                            <input type="text" name="nama" value="<?= old('nama', $value->nama) ?>" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : null ?>" placeholder="Nama Matakuliah">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Semester *</label>
                            <input type="text" name="semester" value="<?= old('semester', $value->semester) ?>" class="form-control <?= $validation->hasError('semester') ? 'is-invalid' : null ?>" placeholder="Semester">
                            <div class="invalid-feedback">
                                <?= $validation->getError('semester') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>SKS *</label>
                            <input type="number" name="sks" value="<?= old('sks', $value->sks) ?>" class="form-control <?= $validation->hasError('sks') ? 'is-invalid' : null ?>" placeholder="SKS">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sks') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Program Studi *</label>
                            <input type="text" name="prodi" value="<?= old('prodi', $value->prodi) ?>" class="form-control <?= $validation->hasError('prodi') ? 'is-invalid' : null ?>" placeholder="Program Studi">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sks') ?>
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