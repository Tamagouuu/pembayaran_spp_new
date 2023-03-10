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

    public function getTransaksiBySiswa($id)
    {
        return $this->db->query("SELECT * FROM v_transaksi WHERE siswa_id = $id")
            ->resultSet();
    }

    public function insert($data)
    {
        foreach ($data['bulan_dibayar'] as $val) {
            $this->db->query("INSERT INTO transaksi VALUES (NULL, now(), :bulan, :tahun, :siswa_id, :petugas_id, :pembayaran_id)")
                ->binds(['bulan' => $val, 'tahun' => date('Y'), 'siswa_id' => $data['siswa_id'], 'petugas_id' => $_SESSION['id'], 'pembayaran_id' => $data['pembayaran_id']])
                ->execute();
        }

        return $this->db->rowCount();
    }

    public function delete($data)
    {
        return $this->db->deleteData('kelas', 'id', $data);
    }

    public function update($data)
    {
        return $this->db->query("UPDATE kelas SET nama_kelas = :nama_kelas, kompetensi_keahlian = :kompetensi_keahlian WHERE id = :id")
            ->binds(['nama_kelas' => $data['nama_kelas'], 'kompetensi_keahlian' => $data['kompetensi_keahlian'], 'id' => $data['id']])
            ->execute()
            ->rowCount();
    }
}
