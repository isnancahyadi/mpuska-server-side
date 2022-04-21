<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Data Dosen &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('dosen/tampil') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data Dosen</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Dosen</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation() ?>
                <?php foreach ($dosen as $key => $value) : ?>
                    <form action="<?= site_url('dosen/update/' . $value->niy) ?>" method="POST" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>No. Induk Yayasan/Pegawai *</label>
                            <input type="text" name="niy_nip" value="<?= old('niy_nip', $value->niy_nip) ?>" class="form-control <?= $validation->hasError('niy_nip') ? 'is-invalid' : null ?>" placeholder="NIY/NIP">
                            <div class="invalid-feedback">
                                <?= $validation->getError('niy_nip') ?>
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
                            <div class="form-group">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir', $value->tgl_lahir) ?>" class="form-control <?= $validation->hasError('tgl_lahir') ? 'is-invalid' : null ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir" value="<?= old('tempat_lahir', $value->tempat_lahir) ?>" class="form-control <?= $validation->hasError('tempat_lahir') ? 'is-invalid' : null ?>" placeholder="Tempat Lahir">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tempat_lahir') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="number" name="no_hp" value="<?= old('no_hp', $value->no_hp) ?>" class="form-control" placeholder="No. HP">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= old('email', $value->email) ?>" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <input type="text" name="alamat" value="<?= old('alamat', $value->alamat) ?>" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : null ?>" placeholder="Alamat">
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Kecamatan *</label>
                                <input type="text" name="kecamatan" value="<?= old('kecamatan', $value->kecamatan) ?>" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : null ?>" placeholder="Kecamatan">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kecamatan') ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kabupaten *</label>
                                <input type="text" name="kabupaten" value="<?= old('kabupaten', $value->kabupaten) ?>" class="form-control <?= $validation->hasError('kabupaten') ? 'is-invalid' : null ?>" placeholder="Kabupaten">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kabupaten') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Provinsi *</label>
                                <input type="text" name="provinsi" value="<?= old('provinsi', $value->provinsi) ?>" class="form-control <?= $validation->hasError('provinsi') ? 'is-invalid' : null ?>" placeholder="Provinsi">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('provinsi') ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" value="<?= old('kode_pos', $value->kode_pos) ?>" class="form-control" placeholder="Kode Pos">
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