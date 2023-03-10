<?php

class Petugas_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPetugas()
    {
        return $this->db->getData('v_petugas');
    }

    public function getPetugas($id)
    {
        return $this->db->getData('v_petugas', 'id', $id);
    }

    public function getPetugasByUsername($username)
    {
        return $this->db->query("SELECT * FROM v_petugas WHERE username = '$username'")->single();
    }

    public function insert($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        try {
            $this->db->beginTransaction();
            $this->db->query("INSERT INTO pengguna VALUES (NULL, :username, :password, 'petugas')")
                ->binds(['username' => $data['username'], 'password' => $data['password']])
                ->execute();
            $id = $this->db->getLastInsertedID();
            $this->db->query("INSERT INTO petugas VALUES (NULL, :nama, :pengguna_id)")
                ->binds(
                    [
                        'nama' => $data['nama'],
                        'pengguna_id' => $id,
                    ]
                )->execute()
                ->commit();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack();
            die($e->getMessage());
        }
    }

    public function delete($data)
    {
        return $this->db->deleteData('pengguna', 'id', $data);
    }

    public function update($data)
    {
        $rowCount = 0;
        try {
            $this->db->beginTransaction();
            $this->db->query("UPDATE pengguna SET username = :username WHERE id = :pengguna_id")
                ->binds(['username' => $data['username'], 'pengguna_id' => $data['pengguna_id']])
                ->execute();
            $rowCount += $this->db->rowCount();
            $this->db->query("UPDATE petugas SET nama = :nama WHERE id = :id")
                ->binds(
                    [
                        'nama' => $data['nama'],
                        'id' => $data['id']
                    ]
                )
                ->execute()
                ->commit();
            return $rowCount += $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack();
            die($e->getMessage());
        }
    }
}
