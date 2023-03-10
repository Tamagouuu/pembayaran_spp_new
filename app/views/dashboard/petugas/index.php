<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['title'], '/createpetugas') ?>

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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['petugas'] as $p) : ?>
                        <tr>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['username'] ?></td>
                            <td>
                                <?= Components::deleteButton("/deletepetugas/{$p['pengguna_id']}") ?>
                                <?= Components::editButton("/editpetugas/{$p['id']}") ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>