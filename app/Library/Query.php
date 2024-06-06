<?php

namespace App\Library;

class Query
{
    const DB_SELECT = 'SELECT';
    const DB_FROM = 'FROM';
    const DB_ORDER = 'ORDER BY';
    const DB_ASC = 'ASC';
    const DB_DESC = 'DESC';
    public function makeSelect(array $fields, string $table, string $order = "name"): string
    {
        $query = self::DB_SELECT . implode(",", $fields);
        $query .= self::DB_FROM . $table;
        $query .= self::DB_ORDER . $order . self::DB_ASC;
        return $query;
    }
}