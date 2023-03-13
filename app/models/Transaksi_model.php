<?php

class Transaksi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaksi()
    {
        return $this->db->getData('v_transaksi');
    }

    public function getTransaksi($id)
    {
        return $this->db->getData('v_transaksi', 'id', $id);
    }

    public function getTransaksiBySiswa($id, $pembid)
    {
        return $this->db->query("SELECT * FROM v_transaksi WHERE siswa_id = $id AND pembayaran_id = $pembid")
            ->resultSet();
    }

    public function getTransaksiByTahun($id, $tahun_ajaran)
    {
        return $this->db->query("SELECT * FROM v_transaksi WHERE siswa_id = $id AND tahun_ajaran = '$tahun_ajaran'")
            ->resultSet();
    }

    public function insert($data)
    {
        foreach ($data['bulan_dibayar'] as $val) {
            $this->db->query("INSERT INTO transaksi VALUES (NULL, now(), :bulan, :tahun, :siswa_id, :petugas_id, :pembayaran_id)")
                ->binds(['bulan' => $val, 'tahun' => date('Y'), 'siswa_id' => $data['siswa_id'], 'petugas_id' => 1, 'pembayaran_id' => $data['pembayaran_id']])
                ->execute();
        }

        return $this->db->rowCount();
    }

    public function delete($data)
    {
        return $this->db->deleteData('kelas', 'id', $data);
    }

    public function getTransaksiBy($kelas, $jurusan, $tahunAjaran)
    {
        if ($kelas == 'all' && $jurusan == 'all' && $tahunAjaran == 'all') {
            return $this->getAllTransaksi();
        }

        $tahunAjaran = implode('/', explode('-', $tahunAjaran));

        $query = "SELECT * FROM v_transaksi WHERE ";

        $where = [];

        if ($kelas != 'all') {
            $where[] = "nama_kelas = '$kelas'";
        }

        if ($jurusan != 'all') {
            $where[] = "kompetensi_keahlian = '$jurusan'";
        }

        if ($tahunAjaran != 'all') {
            $where[] = "tahun_ajaran = '$tahunAjaran'";
        }

        $where = implode(' AND ', $where);
        return $this->db->query($query .= $where)->resultSet();
        // var_dump($data);
        // die;
    }
}
