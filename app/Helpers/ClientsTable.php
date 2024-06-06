<?php
namespace App\Helpers;

class ClientsTable
{
    const TABLE_COLUMNS = [
        'nazwa przedsiębiorcy',
        'numer konta bankowego',
        'NIP'
    ];

    public function printTable($clientsList): string
    {
        $mytable = '';

        foreach ($clientsList as $row) {
            $mytable .= "<tr>";
            $mytable .= "<td>" . $row['name'] . "</td>";
            $mytable .= "<td>" . $row['account_no'] . "</td>";
            $mytable .= "<td>" . $row['nip'] . "</td>";
            $mytable .= "</tr>";
        }
        return $mytable;
    }

}
