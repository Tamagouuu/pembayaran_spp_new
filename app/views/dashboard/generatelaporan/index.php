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
                            <option value="<?= implode('-', explode('/', $j['tahun_ajaran'])) ?>"><?= $j['tahun_ajaran'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <button class=" btn btn-primary btn-user btn-block">
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
        <?php foreach ($data['sorted'] as $k => $d) : ?>
            <div class="card d-inline-block">
                <div class="card-body">
                    <?php $identitas = explode('|', $k) ?>
                    <h3><?= $identitas[0] ?></h3>
                    <ul class="pl-0">
                        <li>Kelas : <?= $identitas[1] ?></li>
                        <li>Kelas</li>
                        <li>NISN</li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nominal</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nominal</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($d as $val) : ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endforeach ?>
            </div>
    </div>
</div>

<script>
    const formFilter = document.querySelector('.filter-user');

    formFilter.addEventListener('submit', (e) => {
        e.preventDefault();

        window.location.href = `http://localhost:8080/pembayaran_spp_new/public/dashboard/generatelaporan/${e.target[0].value}/${e.target[1].value}/${e.target[2].value}`
    })
</script>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>