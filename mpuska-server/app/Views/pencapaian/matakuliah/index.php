<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Pencapaian Matakuliah MBKM &mdash; Mpuska</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Pencapaian Matakuliah MBKM</h1>
        <div class="section-header-button">
            <a href="<?= site_url('capaianmk/add') ?>" class="btn btn-primary">Add New</a>
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
                <h4>Pencapaian Matakuliah MBKM</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Matakuliah</th>
                            <th>Matakuliah</th>
                            <th>CPL</th>
                            <th>CPMK</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (json_decode($cpmk) as $key => $value) : ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->kode_matkul ?></td>
                                <td><?= $value->nama ?></td>
                                <td>
                                    <?php foreach ($value->capaian_lulusan as $k => $v) : ?>
                                        <ul>
                                            <li><?= $v->cpl . ". [CPL " . $k + 1 . "]" ?></li>
                                        </ul>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <?php foreach ($value->capaian_matakuliah as $k => $v) : ?>
                                        <ul>
                                            <li><?= $v->cpmk . ". [CPMK " . $k + 1 . "]" ?></li>
                                        </ul>
                                    <?php endforeach ?>
                                </td>
                                <td class="text-center" style="width: 15%">
                                    <a href="<?= site_url('capaian/edit/' . $value->kode_matkul) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('capaian/delete/' . $value->kode_matkul) ?>" method="POST" class="d-inline" id="del-<?= $value->kode_matkul ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?= $value->kode_matkul ?>)">
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