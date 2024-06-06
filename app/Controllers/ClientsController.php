<?php
namespace App\Controllers;

class ClientsController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->index();
    }

    public function index()
    {
        $clients = new \App\Models\Clients();
        $clientsTable = new \App\Helpers\ClientsTable();
        $clientsList = $clients->all();
        $tableCols = $clientsTable::TABLE_COLUMNS;

        $properties = [
            'search' => (count($clientsList) < 11) ? false : true,
            'dataAmount' => count($clientsList),
            'tableData' => $clientsTable->printTable($clientsList),
            'tableColumns' => $this->html->table_cols2($tableCols),
            'title' => "Lista klientów",
        ];
        echo $this->view->render('common/index', $properties);
    }
}