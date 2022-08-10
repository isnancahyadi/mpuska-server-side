<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Capaian Matakuliah MBKM &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('capaianmk/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Capaian Matakuliah MBKM</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Pencapaian Matakuliah MBKM Baru</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php $errors = session()->getFlashdata('errors') ?>
                <form action="<?= site_url('capaianmk/store') ?>" method="POST" autocomplete="off">
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
                        <label>Capaian Pembelajaran Lulusan (CPL) *</label>
                        <select name="ID_cpl[]" class="form-control select2 <?= isset($errors['ID_cpl']) ? 'is-invalid' : null ?>" multiple="">

                            <?php foreach ($cpl as $key => $value) : ?>
                                <option value="<?= $value->ID_cpl ?>" <?= old('ID_cpl') == $value->ID_cpl ? 'selected' : null ?>>
                                    <?= "CPL " . $value->ID_cpl . " - " . $value->cpl ?>
                                </option>
                            <?php endforeach ?>
                            <div class="invalid-feedback">
                                <?= isset($errors['ID_cpl']) ? $errors['ID_cpl'] : null ?>
                            </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Capaian Pembelajaran Matakuliah (CPMK) *</label>
                        <input type="text" name="cpmk" value="<?= old('cpmk') ?>" class="form-control <?= isset($errors['cpmk']) ? 'is-invalid' : null ?>" data-role="tagsinput">
                        <div class="invalid-feedback">
                            <?= isset($errors['cpmk']) ? $errors['cpmk'] : null ?>
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