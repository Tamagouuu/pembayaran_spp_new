<?php

class Database
{
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $host = DB_HOST;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;


    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query(String $query)
    {
        $this->stmt = $this->dbh->prepare($query);
        return $this;
    }

    public function execute()
    {
        $this->stmt->execute();
        return $this;
    }

    public function binds(array $params)
    {
        foreach ($params as $key => $val) {
            $type = null;
            if (is_int($val)) {
                $type = PDO::PARAM_INT;
            } else if (is_string($val)) {
                $type = PDO::PARAM_STR;
            } else if (is_bool($val)) {
                $type = PDO::PARAM_BOOL;
            } else {
                $type = PDO::PARAM_NULL;
            }
            $this->stmt->bindValue($key, $val, $type);
        }
        return $this;
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    public function getData($table, $column = null, $data = null)
    {
        if ($column != null) {
            return $this->query("SELECT * FROM {$table} WHERE {$column} = :{$column}")
                ->binds([$column => $data])
                ->single();
        } else {
            return $this->query("SELECT * FROM {$table}")->resultSet();
        }
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function deleteData($table, $column, $data)
    {
        return $this->query("DELETE FROM {$table} WHERE {$column} = :{$column}")
            ->binds([$column => $data])
            ->execute()
            ->rowCount();
    }

    public function beginTransaction()
    {
        $this->dbh->beginTransaction();
        return $this;
    }

    public function commit()
    {
        $this->dbh->commit();
        return $this;
    }

    public function getLastInsertedID()
    {
        return $this->dbh->lastInsertId();
    }

    public function rollBack()
    {
        $this->dbh->rollBack();
        return $this;
    }
}
