<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Pengampu &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Pengampu</h1>
        <div class="section-header-button">
            <a href="<?= site_url('pengampu/add') ?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Pengampu</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pengampu</th>
                            <th>Matakuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Program Studi</th>
                            <th>Dosen</th>
                            <th>Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (json_decode($pengampu) as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->ID_pengampu ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->semester ?></td>
                                <td><?= $value->sks ?></td>
                                <td><?= $value->prodi ?></td>
                                <td><?= $value->nama_depan . " " . $value->nama_tengah . " " . $value->nama_belakang ?></td>
                                <td><?= $value->kelas ?></td>
                                <td><?= $value->thn_ajaran ?></td>
                                <td class="text-center" style="width: 15%">
                                    <a href="<?= site_url('pengampu/edit/' . $value->ID_pengampu) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('pengampu/delete/' . $value->ID_pengampu) ?>" method="POST" class="d-inline" id="del-<?= $value->ID_pengampu ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?= $value->ID_pengampu ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>