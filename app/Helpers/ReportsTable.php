<?php
namespace App\Helpers;

class ReportsTable
{
    const TABLE_COLUMNS = [
        'numer',
        'data wystawienia',
        'termin płatności',
        'suma brutto'
    ];
    const REPORT_NAMES = ['nierozliczone faktury po terminie płatności', 'niedopłaty za faktury', 'nadpłaty na koncie klienta'];

    public function printTable($reportData): string
    {
        $mytable = '';

        foreach ($reportData as $row) {
            $mytable .= "<tr>";
            $mytable .= "<td>" . $row['number'] . "</td>";
            $mytable .= "<td>" . $row['issue_date'] . "</td>";
            $mytable .= "<td>" . $row['payment_date'] . "</td>";
            $mytable .= "<td>" . $row['to_pay'] . "</td>";
            $mytable .= "</tr>";
        }
        return $mytable;
    }

    public function getReportName(int $typeId): string
    {
        return self::REPORT_NAMES[$typeId - 1];
    }

}
