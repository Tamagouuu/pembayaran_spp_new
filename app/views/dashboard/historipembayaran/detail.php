<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['title']) ?>


<div class="card p-2 border-bottom-primary" style="min-width: 240px; max-width : 390px">
    <div class="row flex-column flex-sm-row align-items-sm-start align-items-center text-sm-left text-center ">
        <div class="col-sm-6 col-7">
            <img src="<?= BASEURL . "/img/undraw_profile_1.svg" ?>">
        </div>
        <div class="col-sm-6 col-7 mt-2 mt-sm-2">
            <h2 class="h4 font-weight-bold text-primary"><?= $data['siswa']['nama'] ?></h2>
            <ul class="p-0 identitas">
                <li>NIS : <?= $data['siswa']['nis'] ?></li>
                <li>NISN : <?= $data['siswa']['nisn'] ?></li>
                <li>Jurusan : <?= $data['siswa']['kompetensi_keahlian'] ?></li>
                <li>Tahun ajaran : <?= $data['siswa']['tahun_ajaran'] ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Simple Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%" g="0">
                <thead>
                    <tr>
                        <?php foreach ($data['nama_bulan'] as $b) : ?>
                            <th><?= ucfirst($b) ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <?php foreach ($data['nama_bulan'] as $b) : ?>
                            <th><?= ucfirst($b) ?></th>
                        <?php endforeach ?>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <?php foreach ($data['nama_bulan'] as $key => $b) : ?>
                            <?php if (array_key_exists($key, $data['bulan_sorted'])) : ?>
                                <td class="text-center"><i class="fas fa-fw fa-check-circle text-success"></i></td>
                            <?php else : ?>
                                <td class="text-center"><i class="fas fa-fw fa-times-circle text-danger"></i></td>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Detail Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Tahun dibayar</th>
                        <th>Petugas</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Tahun dibayar</th>
                        <th>Petugas</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['bulan_dibayar'] as $d) : ?>
                        <tr>
                            <td><?= $d['tanggal_bayar'] ?></td>
                            <td><?= ucfirst($data['nama_bulan'][$d['bulan_dibayar']]) ?></td>
                            <td><?= $d['tahun_dibayar'] ?></td>
                            <td><?= $d['petugas'] ?></td>
                            <td><?= $d['tahun_ajaran'] ?></td>
                            <td><?= $d['nominal'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>