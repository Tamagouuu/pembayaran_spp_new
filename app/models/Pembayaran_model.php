<?php

class Pembayaran_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembayaran()
    {
        return $this->db->getData('pembayaran');
    }

    public function getPembayaran($id)
    {
        return $this->db->getData('pembayaran', 'id', $id);
    }

    public function insert($data)
    {
        return $this->db->query("INSERT INTO pembayaran VALUES (NULL, :tahun_ajaran, :nominal)")
            ->binds(['tahun_ajaran' => $data['tahun_ajaran'], 'nominal' => $data['nominal']])
            ->execute()
            ->rowCount();
    }

    public function delete($data)
    {
        return $this->db->deleteData('pembayaran', 'id', $data);
    }

    public function update($data)
    {
        return $this->db->query("UPDATE pembayaran SET tahun_ajaran = :tahun_ajaran, nominal = :nominal WHERE id = :id")
            ->binds(['tahun_ajaran' => $data['tahun_ajaran'], 'nominal' => $data['nominal'], 'id' => $data['id']])
            ->execute()
            ->rowCount();
    }
}
