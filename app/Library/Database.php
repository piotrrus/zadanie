<?php

namespace App\Library;

use App\Library\DbBase;

class Database extends DbBase
{

    public function getData(string $query)
    {
        parent::query($query);
        return parent::resultset();
    }

    public function getDataSingle(string $query)
    {
        parent::query($query);
        return parent::single();
    }

    public function countRows(string $query)
    {
        parent::query($query);
        parent::execute();
        return parent::rowCount();
    }
}
