<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Capaian Lulusan MBKM &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('capaian/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Capaian Lulusan MBKM</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Pencapaian Lulusan MBKM Baru</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php $errors = session()->getFlashdata('errors') ?>
                <form action="<?= site_url('capaian/store') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Capaian Pembelajaran Lulusan (CPL)</label>
                        <textarea name="cpl" style="height: 150px;" value="<?= old('cpl') ?>" class="form-control <?= isset($errors['cpl']) ? 'is-invalid' : null ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= isset($errors['cpl']) ? $errors['cpl'] : null ?>
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