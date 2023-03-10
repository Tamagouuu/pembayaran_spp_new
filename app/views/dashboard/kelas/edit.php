<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['subheading']) ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= BASEURL . "/dashboard/updatekelas" ?>" method="POST">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $data['kelas']['id'] ?>">
                <label><small class="font-weight-bold">Nama Kelas</small></label>
                <select name="nama_kelas" class="custom-select" required>
                    <option value="" disabled>---- Pilih Kelas ----</option>
                    <option value="X" <?= ($data['kelas']['nama_kelas'] == 'X') ? 'selected' : ''  ?>>X</option>
                    <option value="XI" <?= ($data['kelas']['nama_kelas'] == 'XI') ? 'selected' : ''  ?>>XII</option>
                    <option value="XII" <?= ($data['kelas']['nama_kelas'] == 'XII') ? 'selected' : ''  ?>>XIII</option>
                </select>
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Kompetensi Keahlian</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Kompetensi Keahlian" name="kompetensi_keahlian" value="<?= $data['kelas']['kompetensi_keahlian'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Edit Data</button>
        </form>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>