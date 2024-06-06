<?php
namespace App\Controllers;

class InvoicesController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->index();
    }
    public function index()
    {
        $invoices = new \App\Models\Invoices();
        $invoicesTable = new \App\Helpers\InvoicesTable();
        $invoicesList = $invoices->all();
        $tableCols = $invoicesTable::TABLE_COLUMNS;

        $properties = [
            'search' => (count($invoicesList) < 11) ? false : true,
            'dataAmount' => count($invoicesList),
            'tableData' => $invoicesTable->printTable($invoicesList),
            'tableColumns' => $this->html->table_cols2($tableCols),
            'title' => "Lista faktur",
        ];
        echo $this->view->render('common/index', $properties);
    }


}