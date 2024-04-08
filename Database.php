<?php


class Database
{
    public $pdo;
    public function __construct($config)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($qry)
    {
        $q = $this->pdo->prepare($qry);
        $q->execute();
        return $q;
    }
}
