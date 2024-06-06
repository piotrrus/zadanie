<?php
namespace App\Helpers;

class InvoicesTable
{
    const TABLE_COLUMNS = [
        'numer',
        'data wystawienia',
        'termin płatności',
        'suma brutto'
    ];

    public function printTable($invoicesList)
    {
        $mytable = '';

        foreach ($invoicesList as $row) {
            $mytable .= "<tr>";
            $mytable .= "<td>" . $row['number'] . "</td>";
            $mytable .= "<td>" . $row['issue_date'] . "</td>";
            $mytable .= "<td>" . $row['payment_date'] . "</td>";
            $mytable .= "<td>" . $row['gross_sum'] . "</td>";
            $mytable .= "</tr>";
        }
        return $mytable;
    }

}
