<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Dosen &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('dosen/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Dosen</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Data Dosen Baru</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php $errors = session()->getFlashdata('errors') ?>
                <form action="<?= site_url('dosen/store') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>No. Induk Yayasan/Pegawai *</label>
                        <input type="text" name="niy_nip" value="<?= old('niy_nip') ?>" class="form-control <?= isset($errors['niy_nip']) ? 'is-invalid' : null ?>" placeholder="NIY/NIP">
                        <div class="invalid-feedback">
                            <?= isset($errors['niy_nip']) ? $errors['niy_nip'] : null ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nama Depan *</label>
                            <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nama Tengah</label>
                            <input type="text" name="nama_tengah" class="form-control" placeholder="Nama Tengah">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Gelar Depan</label>
                            <input type="text" name="gelar_depan" class="form-control" placeholder="Gelar Depan">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gelar Belakang</label>
                            <input type="text" name="gelar_belakang" class="form-control" placeholder="Gelar Belakang">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Jenis Kelamin *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="1">
                                <label class="form-check-label">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="0">
                                <label class="form-check-label">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" name="no_hp" class="form-control" placeholder="No. HP">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : null ?>" placeholder="Email">
                        <div class="invalid-feedback">
                            <?= isset($errors['email']) ? $errors['email'] : null ?>
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