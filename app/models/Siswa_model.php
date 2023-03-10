<?php

class Siswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        return $this->db->getData('v_siswa');
    }

    public function getSiswa($id)
    {
        return $this->db->getData('v_siswa', 'id', $id);
    }

    public function getSiswaByUsername($username)
    {
        return $this->db->query("SELECT * FROM v_siswa WHERE username = '$username'")->single();
    }

    public function insert($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        try {
            $this->db->beginTransaction();
            $this->db->query("INSERT INTO pengguna VALUES (NULL, :username, :password, 'siswa')")
                ->binds(['username' => $data['username'], 'password' => $data['password']])
                ->execute();
            $id = $this->db->getLastInsertedID();
            $this->db->query("INSERT INTO siswa VALUES (NULL, :nisn, :nis, :nama, :alamat, :telepon, :kelas_id, :pengguna_id, :pembayaran_id)")
                ->binds(
                    [
                        'nisn' => $data['nisn'],
                        'nis' => $data['nis'],
                        'nama' => $data['nama'],
                        'alamat' => $data['alamat'],
                        'telepon' => $data['telepon'],
                        'kelas_id' => $data['kelas_id'],
                        'pengguna_id' => $id,
                        'pembayaran_id' => $data['pembayaran_id']
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
            $this->db->query("UPDATE siswa SET nisn = :nisn, nis = :nis, nama = :nama, alamat = :alamat, telepon = :telepon, kelas_id = :kelas_id, pembayaran_id = :pembayaran_id WHERE id = :id")
                ->binds(
                    [
                        'nisn' => $data['nisn'],
                        'nis' => $data['nis'],
                        'nama' => $data['nama'],
                        'alamat' => $data['alamat'],
                        'telepon' => $data['telepon'],
                        'kelas_id' => $data['kelas_id'],
                        'pembayaran_id' => $data['pembayaran_id'],
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
