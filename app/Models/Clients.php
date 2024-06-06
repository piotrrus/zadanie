<?php
namespace App\Models;

use App\Models\AppModel;

class Clients extends AppModel
{
    const DB_TABLE = 'clients';
    public function all()
    {
        $query = "SELECT name, nip, account_no";
        $query .= " FROM " . self::DB_TABLE;
        $query .= parent::DB_ORDER . " name";
        return $this->getData($query);
    }
}
