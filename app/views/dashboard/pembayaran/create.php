<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['subheading']) ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= BASEURL . "/dashboard/storepembayaran" ?>" method="POST">
            <div class="form-group">
                <label><small class="font-weight-bold">Tahun Ajaran</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Tahun Ajaran" name="tahun_ajaran">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Nominal</small></label>
                <input type="number" class="form-control form-control-user" placeholder="Nominal" name="nominal">
            </div>
            <button type="submit" class="btn btn-success">Tambah Data</button>
        </form>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>