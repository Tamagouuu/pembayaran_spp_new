<?php

class Dashboard extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('/dashboard/index', $data);
    }

    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
        $data['datatable'] = true;
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('/dashboard/pembayaran/index', $data);
    }

    public function createPembayaran()
    {
        $data['title'] = 'Pembayaran';
        $data['subheading'] = 'Tambah Pembayaran';
        $this->view('/dashboard/pembayaran/create', $data);
    }

    public function storePembayaran()
    {
        if ($this->model('Pembayaran_model')->insert($_POST) > 0) {
            Flasher::setFlash('Data berhasil ditambah', 'success');
            Helper::redirect('/dashboard/pembayaran');
        } else {
            Flasher::setFlash('Data gagal ditambah', 'danger');
            Helper::redirect('/dashboard/pembayaran');
        }
    }

    public function deletePembayaran($id)
    {
        if ($this->model('Pembayaran_model')->delete($id) > 0) {
            Flasher::setFlash('Data berhasil dihapus', 'success');
            Helper::redirect('/dashboard/pembayaran');
        } else {
            Flasher::setFlash('Data gagal dihapus', 'danger');
            Helper::redirect('/dashboard/pembayaran');
        }
    }

    public function editPembayaran($id)
    {
        $data['title'] = 'Pembayaran';
        $data['subheading'] = 'Edit Pembayaran';
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaran($id);
        $this->view('/dashboard/pembayaran/edit', $data);
    }

    public function updatePembayaran()
    {
        if ($this->model('Pembayaran_model')->update($_POST) > 0) {
            Flasher::setFlash('Data berhasil diedit', 'success');
            Helper::redirect('/dashboard/pembayaran');
        } else {
            Flasher::setFlash('Data gagal diedit', 'danger');
            Helper::redirect('/dashboard/pembayaran');
        }
    }


    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['datatable'] = true;
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $this->view('/dashboard/kelas/index', $data);
    }

    public function createKelas()
    {
        $data['title'] = 'Kelas';
        $data['subheading'] = 'Tambah Kelas';
        $this->view('/dashboard/kelas/create', $data);
    }

    public function storeKelas()
    {
        if ($this->model('Kelas_model')->insert($_POST) > 0) {
            Flasher::setFlash('Data berhasil ditambah', 'success');
            Helper::redirect('/dashboard/kelas');
        } else {
            Flasher::setFlash('Data gagal ditambah', 'danger');
            Helper::redirect('/dashboard/kelas');
        }
    }

    public function deleteKelas($id)
    {
        if ($this->model('Kelas_model')->delete($id) > 0) {
            Flasher::setFlash('Data berhasil dihapus', 'success');
            Helper::redirect('/dashboard/kelas');
        } else {
            Flasher::setFlash('Data gagal dihapus', 'danger');
            Helper::redirect('/dashboard/kelas');
        }
    }

    public function editKelas($id)
    {
        $data['title'] = 'Kelas';
        $data['subheading'] = 'Edit Kelas';
        $data['kelas'] = $this->model('Kelas_model')->getKelas($id);
        $this->view('/dashboard/kelas/edit', $data);
    }

    public function updateKelas()
    {
        if ($this->model('Kelas_model')->update($_POST) > 0) {
            Flasher::setFlash('Data berhasil diedit', 'success');
            Helper::redirect('/dashboard/kelas');
        } else {
            Flasher::setFlash('Data gagal diedit', 'danger');
            Helper::redirect('/dashboard/kelas');
        }
    }

    public function siswa()
    {
        $data['title'] = 'Siswa';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('/dashboard/siswa/index', $data);
    }

    public function createSiswa()
    {
        $data['title'] = 'Siswa';
        $data['subheading'] = 'Tambah Siswa';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('/dashboard/siswa/create', $data);
    }

    public function storeSiswa()
    {
        if ($this->model('Siswa_model')->insert($_POST) > 0) {
            Flasher::setFlash('Data berhasil ditambah', 'success');
            Helper::redirect('/dashboard/siswa');
        } else {
            Flasher::setFlash('Data gagal ditambah', 'danger');
            Helper::redirect('/dashboard/siswa');
        }
    }

    public function deleteSiswa($id)
    {
        if ($this->model('Siswa_model')->delete($id) > 0) {
            Flasher::setFlash('Data berhasil dihapus', 'success');
            Helper::redirect('/dashboard/siswa');
        } else {
            Flasher::setFlash('Data gagal dihapus', 'danger');
            Helper::redirect('/dashboard/siswa');
        }
    }

    public function editSiswa($id)
    {
        $data['title'] = 'Siswa';
        $data['subheading'] = 'Edit Siswa';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['siswa'] = $this->model('Siswa_model')->getSiswa($id);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('/dashboard/siswa/edit', $data);
    }

    public function updateSiswa()
    {
        if ($this->model('Siswa_model')->update($_POST) > 0) {
            Flasher::setFlash('Data berhasil diedit', 'success');
            Helper::redirect('/dashboard/siswa');
        } else {
            Flasher::setFlash('Data gagal diedit', 'danger');
            Helper::redirect('/dashboard/siswa');
        }
    }

    public function petugas()
    {
        $data['title'] = 'Petugas';
        $data['datatable'] = true;
        $data['petugas'] = $this->model('Petugas_model')->getAllPetugas();
        $this->view('/dashboard/petugas/index', $data);
    }

    public function createPetugas()
    {
        $data['title'] = 'Petugas';
        $data['subheading'] = 'Tambah Petugas';
        // $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        // $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('/dashboard/petugas/create', $data);
    }

    public function storePetugas()
    {
        if ($this->model('Petugas_model')->insert($_POST) > 0) {
            Flasher::setFlash('Data berhasil ditambah', 'success');
            Helper::redirect('/dashboard/petugas');
        } else {
            Flasher::setFlash('Data gagal ditambah', 'danger');
            Helper::redirect('/dashboard/petugas');
        }
    }

    public function deletePetugas($id)
    {
        if ($this->model('Petugas_model')->delete($id) > 0) {
            Flasher::setFlash('Data berhasil dihapus', 'success');
            Helper::redirect('/dashboard/petugas');
        } else {
            Flasher::setFlash('Data gagal dihapus', 'danger');
            Helper::redirect('/dashboard/petugas');
        }
    }

    public function editPetugas($id)
    {
        $data['title'] = 'Petugas';
        $data['subheading'] = 'Edit Petugas';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['petugas'] = $this->model('Petugas_model')->getPetugas($id);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('/dashboard/petugas/edit', $data);
    }

    public function updatePetugas()
    {
        if ($this->model('Petugas_model')->update($_POST) > 0) {
            Flasher::setFlash('Data berhasil diedit', 'success');
            Helper::redirect('/dashboard/petugas');
        } else {
            Flasher::setFlash('Data gagal diedit', 'danger');
            Helper::redirect('/dashboard/petugas');
        }
    }

    public function entryPembayaran()
    {
        $data['title'] = 'Entry Pembayaran';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('/dashboard/entrypembayaran/index', $data);
    }

    public function bayar($id = null, $tahun = null)
    {
        $data['title'] = 'Bayar SPP';
        $data['siswa'] = $this->model('Siswa_model')->getSiswa($id);
        // $data['bulan_dibayar'] = $this->model('Transaksi_model')->getTransaksiBySiswa($id, $data['siswa']['pembayaran_id']);
        // $data['bulan_sorted'] = [];
        // foreach ($data['bulan_dibayar'] as $b) {
        //     $data['bulan_sorted'][$b['bulan_dibayar']] = ['nominal' => $b['nominal'], 'tahun_ajaran' => $b['tahun_ajaran']];
        // }

        // cek apakah dia ada transaksi di tahun ajaran sebelumnya tidak
        if ($data['siswa']['tahun_ajaran_masuk'] != $data['siswa']['tahun_ajaran']) {
            $data['tahunAjaran'] = $this->model('Pembayaran_model')->cekTahun($data['siswa']['tahun_ajaran_masuk'], $data['siswa']['tahun_ajaran']);
        }

        if ($tahun != null) {
            $tahun = explode('-', $tahun);
            $tahun = implode('/', $tahun);
            $data['bulan_dibayar'] = $this->model('Transaksi_model')->getTransaksiByTahun($id, $tahun);
            $data['bulan_sorted'] = [];
            foreach ($data['bulan_dibayar'] as $b) {
                $data['bulan_sorted'][$b['bulan_dibayar']] = ['nominal' => $b['nominal'], 'tahun_ajaran' => $b['tahun_ajaran']];
            }
            $data['tahunAjaranSkrng'] = $this->model('Pembayaran_model')->cekPembayaranId($tahun)['id'];
            $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaran($data['tahunAjaranSkrng']);
        } else {
            $data['bulan_dibayar'] = $this->model('Transaksi_model')->getTransaksiBySiswa($id, $data['siswa']['pembayaran_id']);
            $data['bulan_sorted'] = [];
            foreach ($data['bulan_dibayar'] as $b) {
                $data['bulan_sorted'][$b['bulan_dibayar']] = ['nominal' => $b['nominal'], 'tahun_ajaran' => $b['tahun_ajaran']];
            }
            $data['tahunAjaranSkrng'] = $data['siswa']['pembayaran_id'];
            $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaran($data['siswa']['pembayaran_id']);
        }

        $data['nama_bulan'] = NAMA_BULAN;
        $this->view('/dashboard/entrypembayaran/bayar', $data);
    }

    public function storeBayar()
    {

        if ($this->model('Transaksi_model')->insert($_POST) > 0) {
            Flasher::setFlash('Data berhasil ditambah', 'success');
            Helper::redirect('/dashboard/entrypembayaran');
        } else {
            Flasher::setFlash('Data gagal ditambah', 'danger');
            Helper::redirect('/dashboard/entrypembayaran');
        }
    }

    public function historiPembayaran()
    {
        $data['title'] = 'Histori Pembayaran';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('/dashboard/historipembayaran/index', $data);
    }

    public function detailHistori($id)
    {
        $data['title'] = 'Detail Histori';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getSiswa($id);
        $data['nama_bulan'] = NAMA_BULAN;
        $data['bulan_dibayar'] = $this->model('Transaksi_model')->getTransaksiBySiswa($id);
        $data['bulan_sorted'] = [];
        foreach ($data['bulan_dibayar'] as $b) {
            $data['bulan_sorted'][$b['bulan_dibayar']] = ['nominal' => $b['nominal'], 'tahun_ajaran' => $b['tahun_ajaran']];
        }
        $this->view('/dashboard/historipembayaran/detail', $data);
    }

    public function generateLaporan($kelas = null, $jurusan = null, $tahunAjaran = null)
    {
        $data['title'] = 'Generate Laporan';
        $data['jurusan'] = $this->model('Kelas_model')->getKompetensiKeahlian();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        // if ($kelas != null || $jurusan != null || $tahunAjaranSatu != null) {
        //     if ($kelas == 'all' && $jurusan == 'all' && $tahunAjaranSatu == 'all') {
        //         $sandi = $this->model("Transaksi_model")->getAllTransaksi();
        //         $sorted = [];
        //         foreach ($sandi as $d) {
        //             $sorted[$d['nama_siswa'] . '|' . $d['nisn'] . '|' . $d['nama_kelas'] . '|' . $d['kompetensi_keahlian']][] = $d['bulan_dibayar'];
        //         }
        //     }
        // }

        if ($kelas != null || $jurusan != null || $tahunAjaran != null) {

            $transaksiData = $this->model("Transaksi_model")->getTransaksiBy($kelas, $jurusan, $tahunAjaran);

            $sorted = [];

            foreach ($transaksiData as $d) {
                $sorted[$d['nama'] . '|' . $d['nama_kelas'] . '|' . $d['kompetensi_keahlian'] . '|' . $d['nisn']][] = $d;
            }

            // var_dump($sorted);

            $data['sorted'] = $sorted;
            // die;
        }
        $this->view('/dashboard/generatelaporan/index', $data);
    }
}
