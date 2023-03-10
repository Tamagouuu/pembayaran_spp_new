<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['subheading']) ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= BASEURL . "/dashboard/updatepetugas" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $data['petugas']['id'] ?>">
            <input type="hidden" name="pengguna_id" value="<?= $data['petugas']['pengguna_id'] ?>">
            <div class="form-group">
                <label><small class="font-weight-bold">Nama Petugas</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Nama Petugas" name="nama" value="<?= $data['petugas']['nama'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Username</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Username" name="username" value="<?= $data['petugas']['username'] ?>">
            </div>
            <button type=" submit" class="btn btn-success">Edit Data</button>
        </form>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>