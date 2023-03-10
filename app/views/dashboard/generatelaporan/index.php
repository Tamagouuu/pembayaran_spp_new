<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['title'], '/createsiswa') ?>

<?php Flasher::flash() ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter</h6>
    </div>
    <div class="card-body">
        <form class="user filter-user">
            <div class="form-group row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <label><small class="font-weight-bold">Kelas</small></label>
                    <select name="nama_kelas" class="custom-select" required>
                        <option value="all" selected>Semua Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XII</option>
                        <option value="XII">XIII</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <label><small class="font-weight-bold">Kompetensi Keahlian</small></label>
                    <select name="nama_kelas" class="custom-select" required>
                        <option value="all" selected>Semua Kompetensi Keahlian</option>
                        <?php foreach ($data['jurusan'] as $j) : ?>
                            <option value="<?= $j['kompetensi_keahlian'] ?>"><?= $j['kompetensi_keahlian'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <label><small class="font-weight-bold">Tahun ajaran</small></label>
                    <select name="nama_kelas" class="custom-select" required>
                        <option value="all" selected>Semua Tahun Ajaran</option>
                        <?php foreach ($data['pembayaran'] as $j) : ?>
                            <option value="<?= $j['tahun_ajaran'] ?>"><?= $j['tahun_ajaran'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary btn-user btn-block">
                Filter Data
            </button>
        </form>
    </div>
</div>

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
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Tahun Ajaran</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Username</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td><?= $s['nisn'] ?></td>
                        <td><?= $s['nis'] ?></td>
                        <td><?= $s['username'] ?></td>
                        <td><?= $s['nama'] ?></td>
                        <td><?= $s['alamat'] ?></td>
                        <td><?= $s['telepon'] ?></td>
                        <td><?= $s['tahun_ajaran'] ?></td>
                        <td><?= $s['kompetensi_keahlian'] ?></td>
                        <td><?= $s['nominal'] ?></td>
                        <td>
                            <?= Components::deleteButton("/deletesiswa/{$s['pengguna_id']}") ?>
                            <?= Components::editButton("/editsiswa/{$s['id']}") ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const formFilter = document.querySelector('.filter-user');

    formFilter.addEventListener('submit', (e) => {
        e.preventDefault()
        window.location.replace(`http://localhost/pembayaran_spp_new/public/dashboard/generatelaporan/${e.target[0].value}/${e.target[1].value}/${e.target[2].value}`)
    })
</script>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>