<?php

namespace App\Library;

use App\Library\Request;

class Route
{
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $action = $this->request->get('action');
        $this->useController($action);
    }

    private function useController($path)
    {
        switch ($path) {
            case 'clients':
                $controller = new \App\Controllers\ClientsController();
                break;
            case 'invoices':
                $controller = new \App\Controllers\InvoicesController();
                break;
            case 'payments':
                $controller = new \App\Controllers\PaymentsController();
                break;
            case 'reports':
                $controller = new \App\Controllers\ReportsController();
                break;
            default:
                $controller = new \App\Controllers\InvoicesController();
                break;
        }
    }
}
