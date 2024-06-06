<?php
namespace App\Controllers;

use App\Library\Request;
use App\Library\Template;
use App\Library\Html;
use App\Library\ErrorMessage;

class Controller
{

    protected $request;
    protected $view;
    protected $html;
    protected $message;

    public function __construct()
    {
        $this->view = new Template();
        $this->html = new Html();
        $this->message = new ErrorMessage();
        $this->request = new Request();
    }

    public function getMethodName()
    {
        return $this->request::get('action', 'index');
    }

    public function getRequest($request)
    {
        return $this->request->get($request);
    }

}