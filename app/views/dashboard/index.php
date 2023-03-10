<?php require_once PARTIAL_PATH . '/dashboard/header.php' ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 mr-5">Dashboard</h1>
    <div class="d-sm-flex d-block">
        <a href="<?= BASEURL . "/dashboard/entrypembayaran" ?>" class="d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2 mt-2"><i class="fas fa-money-bill-wave fa-sm text-white-50"></i> Entry Pembayaran</a>
        <a href="<?= BASEURL . "/dashboard/historipembayaran" ?>" class="d-sm-inline-block btn btn-sm btn-info shadow-sm mr-2 mt-2"><i class="fas fa-history fa-sm text-white-50"></i> Histori Transaksi</a>
        <a href="<?= BASEURL . "/dashboard/generatelaporan" ?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i class="fas fa-print fa-sm text-white-50"></i> Generate Report</a>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Card Pembayaran -->
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/pembayaran">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pembayaran
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Card Kelas -->
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/kelas">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kelas
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Card Siswa -->
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/siswa">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Siswa
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Card Petugas -->
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/petugas">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Petugas
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <?php require_once PARTIAL_PATH . '/dashboard/footer.php' ?>