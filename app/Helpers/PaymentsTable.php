<?php
namespace App\Helpers;

class PaymentsTable
{
    const TABLE_COLUMNS = [
        'tytuł płatności',
        'kwota',
        'data wpłaty',
        'numer konta bankowego wpłaty'
    ];

    public function printTable($contractorsList)
    {
        $mytable = '';

        foreach ($contractorsList as $row) {
            $mytable .= "<tr>";
            $mytable .= "<td>" . $row['title'] . "</td>";
            $mytable .= "<td>" . $row['paid'] . "</td>";
            $mytable .= "<td>" . $row['payment_date'] . "</td>";
            $mytable .= "<td>" . $row['account_no'] . "</td>";
            $mytable .= "</tr>";
        }
        return $mytable;
    }

}
