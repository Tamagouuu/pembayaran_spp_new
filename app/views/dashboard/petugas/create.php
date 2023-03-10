<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['subheading']) ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= BASEURL . "/dashboard/storepetugas" ?>" method="POST">
            <div class="form-group">
                <label><small class="font-weight-bold">Nama Petugas</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Nama Petugas" name="nama">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Username</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Password</small></label>
                <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-success">Tambah Data</button>
        </form>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>