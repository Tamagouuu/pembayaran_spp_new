<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->

<?= Components::heading($data['title']) ?>


<?php if (isset($data['tahunAjaran'])) : ?>
    <?php foreach ($data['tahunAjaran'] as $t) : ?>
        <?php $tlink = explode('/', $t);
        $tlink = implode('-', $tlink) ?>
        <?php if ($t != $data['siswa']['tahun_ajaran']) : ?>
            <a href="<?= BASEURL . "/dashboard/bayar/" . $data['siswa']['id'] . "/{$tlink}" ?>"><?= $t ?></a>
        <?php else : ?>
            <a href="<?= BASEURL . "/dashboard/bayar/" . $data['siswa']['id'] ?>"><?= $t ?></a>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>

<div class="card p-2 border-bottom-primary" style="min-width: 240px; max-width : 390px">
    <div class="row flex-column flex-sm-row align-items-sm-start align-items-center text-sm-left text-center ">
        <div class="col-sm-6 col-7">
            <img src="<?= BASEURL . "/img/undraw_profile_1.svg" ?>">
        </div>
        <div class="col-sm-6 col-7 mt-2 mt-sm-2">
            <h2 class="h4 font-weight-bold text-primary"><?= $data['siswa']['nama'] ?></h2>
            <ul class="p-0 identitas">
                <li>NIS : <?= $data['siswa']['nis'] ?></li>
                <li>NISN : <?= $data['siswa']['nisn'] ?></li>
                <li>Jurusan : <?= $data['siswa']['kompetensi_keahlian'] ?></li>
                <li>Tahun ajaran : <?= $data['siswa']['tahun_ajaran'] ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
    <div class="card-body">
        <form action="<?= Helper::baseURL('/dashboard/storebayar') ?>" method="post">
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <input type="hidden" name="siswa_id" value="<?= $data['siswa']['id'] ?>">
                <input type="hidden" name="pembayaran_id" value="<?= $data['tahunAjaranSkrng'] ?>">
                <?php foreach ($data['nama_bulan'] as $key => $val) : ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-top-primary shadow h-100 pt-2 position-relative">
                            <?php if (array_key_exists($key, $data['bulan_sorted'])) : ?>
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $val ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Helper::formatRupiah($data['bulan_sorted'][$key]['nominal']) ?></div>
                                </div>
                                <input type="checkbox" width="100%" class="btn-bayar" checked disabled>
                                <button class="btn-bayar-disabled">Sudah bayar</button>
                            <?php else : ?>
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $val ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Helper::formatRupiah($data['pembayaran']['nominal']) ?></div>
                                </div>
                                <input type="checkbox" width="100%" class="btn-bayar" name="bulan_dibayar[]" value="<?= $key ?>" data-nominal="<?= $data['pembayaran']['nominal'] ?>">
                                <button class="btn-bayar-asli">Bayar</button>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <h3 class="text-dark h4">Total : <span class="font-weight-bold total-bayar"><?= Helper::formatRupiah(0) ?></span></h3>
            <button type="submit" class="btn btn-success" onclick="return confirm('Yakin Bayar?')">Bayar</button>
        </form>
    </div>
</div>


<script>
    const checkBox = document.querySelectorAll('.btn-bayar');
    const textTotal = document.querySelector('.total-bayar');
    const totalBayar = [];

    const intToCurrency = (val) => {
        const fmt = new Intl.NumberFormat('id-ID', {
            currency: 'IDR',
            style: 'currency'
        })
        return fmt.format(val);
    }

    const updateTotal = () => {
        if (totalBayar.length != 0) {
            const totalDuid = totalBayar.reduce((acc, val) => {
                return acc + val
            })
            textTotal.textContent = intToCurrency(totalDuid)
        } else {
            textTotal.textContent = intToCurrency(0)
        }
    }

    checkBox.forEach((e) => {
        e.addEventListener('click', () => {
            const nextSib = e.nextElementSibling;
            if (!e.checked) {
                nextSib.classList.remove('batal-bayar')
                nextSib.textContent = "Bayar"
                totalBayar.pop();
                console.log('clicked')
                updateTotal()
            } else {
                nextSib.classList.add('batal-bayar')
                nextSib.textContent = "Batal Bayar"
                totalBayar.push(+e.dataset.nominal)
                console.log('clicked')

                updateTotal()
            }
        })
    })
</script>

<?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>