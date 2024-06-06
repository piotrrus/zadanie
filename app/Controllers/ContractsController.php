<?php
namespace App\Controllers;

use App\Library\Request;

class ContractsController
{
    private $request;
    const MAIN_ACTION = 5;
    const QUERY = "SELECT * FROM contracts";

    public function __construct()
    {
        $this->request = new Request();
    }

    public function printTable(): string
    {
        $contractData = $this->getData();
        $isFiltered = $this->isFiltered();
        return $isFiltered ?
            $this->createTableFiltered($contractData) :
            $this->createTableAll($contractData);
    }

    private function getData()
    {
        $contracts = new \App\Models\Contracts();
        $isFiltered = $this->isFiltered();

        $contractData = $contracts->all($isFiltered);

        return $contractData;

    }
    private function isFiltered(): bool
    {
        $akcja = (int) $this->request->get('akcja');
        return ($akcja === self::MAIN_ACTION) ? true : false;
    }

    private function createTableFiltered($data): string
    {
        $table = "";
        foreach ($data as $row) {
            $table .= '<tr>';
            $table .= $this->wrapTd($row['id']);
            $rowSecond = ($row['amount'] > 5) ? $row['name'] . ' ' . $row['amount'] : $row['name'];
            $table .= $this->wrapTd($rowSecond);
            $table .= '<tr>';
        }
        return $table;
    }

    private function createTableAll($data): string
    {
        $table = "";
        foreach ($data as $row) {
            $table .= '<tr>';
            $table .= $this->wrapTd($row['id']);
            $table .= $this->wrapTd($row['name']);
            $table .= '<tr>';
        }
        return $table;
    }

    private function wrapTd($data): string
    {
        return '<td>' . $data . '</td>';
    }

}
