<?php
namespace App\Models;

use App\Models\AppModel;

class Invoices extends AppModel
{
    const DB_TABLE = 'invoices';
    public function all()
    {
        $query = "SELECT number, issue_date, payment_date, gross_sum";
        $query .= " FROM " . self::DB_TABLE;
        $query .= parent::DB_ORDER . " payment_date";
        return $this->getData($query);
    }
}
