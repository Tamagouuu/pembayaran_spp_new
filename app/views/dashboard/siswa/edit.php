<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['subheading']) ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $data['title'] ?></h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= BASEURL . "/dashboard/updatesiswa" ?>" method="POST">
            <input type="hidden" name="id" value="<?= $data['siswa']['id'] ?>">
            <input type="hidden" name="pengguna_id" value="<?= $data['siswa']['pengguna_id'] ?>">
            <div class="form-group">
                <label><small class="font-weight-bold">NISN</small></label>
                <input type="number" class="form-control form-control-user" placeholder="NISN" name="nisn" value="<?= $data['siswa']['nisn'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">NIS</small></label>
                <input type="number" class="form-control form-control-user" placeholder="NIS" name="nis" value="<?= $data['siswa']['nis'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Username</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Username" name="username" value="<?= $data['siswa']['username'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Nama</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Nama" name="nama" value="<?= $data['siswa']['nama'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Alamat</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Alamat" name="alamat" value="<?= $data['siswa']['alamat'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Telepon</small></label>
                <input type="text" class="form-control form-control-user" placeholder="Telepon" name="telepon" value="<?= $data['siswa']['telepon'] ?>">
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Kelas</small></label>
                <select name="kelas_id" class="custom-select" required>
                    <option value="" selected disabled>---- Pilih Kelas ----</option>
                    <?php foreach ($data['kelas'] as $k) : ?>
                        <option value="<?= $k['id'] ?>" <?= ($data['siswa']['kelas_id'] == $k['id']) ? 'selected' : '' ?>><?= $k['nama_kelas'] ?> - <?= $k['kompetensi_keahlian'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label><small class="font-weight-bold">Tahun ajaran</small></label>
                <select name="pembayaran_id" class="custom-select" required>
                    <option value="" selected disabled>---- Pilih Tahun Ajaran ----</option>
                    <?php foreach ($data['pembayaran'] as $p) : ?>
                        <option value="<?= $p['id'] ?>" <?= ($data['siswa']['pembayaran_id'] == $p['id']) ? 'selected' : '' ?>><?= $p['tahun_ajaran'] ?> - <?= Helper::formatRupiah($p['nominal']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Edit Data</button>
        </form>
    </div>
</div>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>