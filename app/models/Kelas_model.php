<?php

class Kelas_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        return $this->db->getData('kelas');
    }

    public function getKelas($id)
    {
        return $this->db->getData('kelas', 'id', $id);
    }

    public function getKompetensiKeahlian()
    {
        return $this->db->query("SELECT DISTINCT kompetensi_keahlian FROM kelas")->resultSet();
    }

    public function insert($data)
    {
        return $this->db->query("INSERT INTO kelas VALUES (NULL, :nama_kelas, :kompetensi_keahlian)")
            ->binds(['nama_kelas' => $data['nama_kelas'], 'kompetensi_keahlian' => $data['kompetensi_keahlian']])
            ->execute()
            ->rowCount();
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
