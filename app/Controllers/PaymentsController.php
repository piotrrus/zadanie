<?php
namespace App\Controllers;

class PaymentsController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->index();
    }
    public function index()
    {
        $payments = new \App\Models\Payments();
        $paymentsTable = new \App\Helpers\PaymentsTable();
        $paymentsList = $payments->all();
        $tableCols = $paymentsTable::TABLE_COLUMNS;

        $properties = [
            'search' => (count($paymentsList) < 11) ? false : true,
            'dataAmount' => count($paymentsList),
            'tableData' => $paymentsTable->printTable($paymentsList),
            'tableColumns' => $this->html->table_cols2($tableCols),
            'title' => "Lista płatności",
        ];
        echo $this->view->render('common/index', $properties);
    }
}