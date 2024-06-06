<?php
namespace App\Models;

use App\Models\AppModel;

class Payments extends AppModel
{

    const DB_TABLE = 'payments';
    public function all()
    {
        $query = "SELECT title, paid, payment_date, account_no";
        $query .= " FROM " . self::DB_TABLE;
        $query .= parent::DB_ORDER . " payment_date DESC";
        return $this->getData($query);
    }

}
