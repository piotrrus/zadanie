<?php

namespace App\Models;

use App\Library\Database;

abstract class AppModel
{

    const DB_ORDER = ' ORDER BY';
    const DB_ASC = 'ASC';
    const DB_DESC = 'DESC';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getData($query)
    {
        return $this->db->getData($query);
    }

    public function getDataSingle($query)
    {
        return $this->db->getDataSingle($query);
    }

    public function countRows($query)
    {
        $this->db->countRows($query);
    }

    public function executeSql($sql)
    {
        $this->db->query($sql);
        $this->db->execute();
    }

}
