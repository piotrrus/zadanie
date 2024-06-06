<?php
namespace App\Models;

use App\Models\AppModel;

class Reports extends AppModel
{
    const DB_TABLE = 'payments';

    public function all()
    {

    }

    //raport wyświetlający nadpłaty na koncie klienta,
    public function surplusReport()
    {
        $query = $this->getQuery();
        $query .= " WHERE gross_sum - paid < 0";
        //  $query .= parent::DB_ORDER . " payment_date DESC";
        return $this->getData($query);
    }
    // raport wyświetlający niedopłaty za faktury,
    public function notPaidReport()
    {
        $query = $this->getQuery();
        $query .= " WHERE gross_sum - paid > 0";
        return $this->getData($query);
    }

    //raport wyświetlający nierozliczone faktury po terminie płatności.
    public function afterDeadlineReport()
    {
        $query = $this->getQuery();
        $query .= " WHERE i.payment_date < NOW()";
        $query .= "AND gross_sum - paid > 0";
        return $this->getData($query);
    }

    private function getQuery(): string
    {
        $query = "SELECT title, p.payment_date, c.account_no, ";
        $query .= " c.name as client, number,";
        $query .= " issue_date, gross_sum as to_pay, paid, i.payment_date as invoice_date";
        $query .= " FROM " . self::DB_TABLE . " as p";
        $query .= " LEFT JOIN clients c ON p.client_id =c.id";
        $query .= " LEFT JOIN invoices i ON p.id =i.payment_id";
        return $query;
    }

}