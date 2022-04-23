<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Dosen &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dosen</h1>
        <div class="section-header-button">
            <a href="<?= site_url('dosen/add') ?>" class="btn btn-primary">Add New</a>
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
                <h4>Data Dosen</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIY/NIP</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (json_decode($dosen) as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->niy_nip ?></td>
                                <td><?= $value->gelar_depan == '' ? $value->nama_depan . " " . $value->nama_tengah . " " . $value->nama_belakang . ", " . $value->gelar_belakang : $value->gelar_depan . " " . $value->nama_depan . " " . $value->nama_tengah . " " . $value->nama_belakang . ", " . $value->gelar_belakang ?></td>
                                <td><?= $value->gender == '1' ? "Pria" : ($value->gender == '0' ? "Wanita" : "0") ?></td>
                                <td><?= $value->no_hp ?></td>
                                <td><?= $value->email ?></td>
                                <td class="text-center" style="width: 15%">
                                    <a href="<?= site_url('dosen/edit/' . $value->niy_nip) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('dosen/delete/' . $value->niy_nip) ?>" method="POST" class="d-inline" id="del-<?= $value->niy_nip ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?= $value->niy_nip ?>)">
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