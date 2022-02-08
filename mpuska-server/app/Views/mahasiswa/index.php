<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Mahasiswa &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Mahasiswa</h1>
        <div class="section-header-button">
            <a href="<?= site_url('mahasiswa/add') ?>" class="btn btn-primary">Add New</a>
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
                <h4>Data Mahasiswa</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (json_decode($mahasiswa) as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nim ?></td>
                                <td><?= $value->nama_depan . " " . $value->nama_tengah . " " . $value->nama_belakang ?></td>
                                <td><?= $value->gender == '1' ? "Pria" : ($value->gender == '0' ? "Wanita" : "0") ?></td>
                                <td><?= $value->tempat_lahir ?></td>
                                <td><?= $value->tgl_lahir ?></td>
                                <td><?= $value->no_hp ?></td>
                                <td><?= $value->alamat . ", " . $value->kecamatan . ", " . $value->kabupaten . ", " . $value->provinsi . ", " . $value->kode_pos ?></td>
                                <td><?= $value->email ?></td>
                                <td class="text-center" style="width: 15%">
                                    <a href="<?= site_url('mahasiswa/' . $value->nim . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('mahasiswa/' . $value->nim) ?>" method="POST" class="d-inline" id="del-<?= $value->nim ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?= $value->nim ?>)">
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