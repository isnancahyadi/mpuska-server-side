<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Capaian Lulusan MBKM &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('capaian/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Capaian Lulusan MBKM</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Pencapaian Lulusan MBKM</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php foreach ($cpl as $key => $value) : ?>
                    <form action="<?= site_url('capaian/update/' . $value->ID_cpl) ?>" method="POST" autocomplete="off">
                        <?= csrf_field() ?>

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Capaian Pembelajaran Lulusan (CPL)</label>
                            <textarea name="cpl" style="height: 150px;" value="<?= old('cpl', $value->cpl) ?>" class="form-control <?= $validation->hasError('cpl') ? 'is-invalid' : null ?>"><?= $value->cpl ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('cpl') ?>
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