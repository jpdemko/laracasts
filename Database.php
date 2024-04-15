<?php


class Database
{
    public $pdo;
    public $statement;

    public function __construct($config, $uname = 'root', $pword = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, $uname, $pword, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($qry, $params = [])
    {
        $this->statement = $this->pdo->prepare($qry);
        $this->statement->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $res = $this->statement->fetch();
        if (!$res) {
            abort();
        }
        return $res;
    }
}
