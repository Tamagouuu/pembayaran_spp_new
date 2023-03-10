<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['subheading']) ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= BASEURL . "/dashboard/storekelas" ?>" method="POST">
            <div class="form-group">
                <label><small class="font-weight-bold">Nama Kelas</small></label>
                <select name="nama_kelas" class="custom-select" required>
                    <option value="" selected disabled>---- Pilih Kelas ----</option>
                    <option value="X">X</option>
                    <option value="XI">XII</option>
                    <option value="XII">XIII</option>
                </select>
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Kompetensi Keahlian</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Kompetensi Keahlian" name="kompetensi_keahlian">
            </div>
            <button type="submit" class="btn btn-success">Tambah Data</button>
        </form>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>