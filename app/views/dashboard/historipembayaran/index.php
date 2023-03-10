<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['title'], '/createsiswa') ?>

<?php Flasher::flash() ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Username</th>
                        <th>Nama Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Username</th>
                        <th>Nama Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['siswa'] as $s) : ?>
                        <tr>
                            <td><?= $s['nisn'] ?></td>
                            <td><?= $s['nis'] ?></td>
                            <td><?= $s['username'] ?></td>
                            <td><?= $s['nama'] ?></td>
                            <td>
                                <a href="<?= BASEURL . "/dashboard/detailhistori/{$s['id']}" ?>" class="btn-sm btn-warning btn-icon-split text-decoration-none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text">Histori</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>