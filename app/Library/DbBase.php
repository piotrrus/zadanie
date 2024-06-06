<?php

namespace App\Library;

abstract class DbBase
{

    private $dbh;
    private $dsn;
    private $error;
    private $stmt;

    abstract function getData(string $sql);
    abstract function getDataSingle(string $sql);
    abstract function countRows(string $sql);

    public function __construct()
    {
        $dsn = 'mysql:host=' . \Conf::DB_HOST . ';dbname=' . \Conf::DB_NAME;

        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new \PDO($dsn, \Conf::DB_USER, \Conf::DB_PASS, $options);
            $this->dbh->query('SET NAMES utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query(string $query)
    {
        try {
            $this->stmt = $this->dbh->prepare($query);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $e->getMessage();
        }
    }

    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $e->getMessage();
        }
    }

    public function resultset()
    {
        try {
            $this->execute();
            return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $e->getMessage();
        }
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function single_num()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_NUM);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function colCount()
    {
        return $this->stmt->columnCount();
    }

    public function lastInsertId()
    {
        return $this->dsn->lastInsertId();
    }

}