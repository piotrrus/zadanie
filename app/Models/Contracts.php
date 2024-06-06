<?php
namespace App\Models;

use App\Models\AppModel;

class Contracts extends AppModel
{

    const DB_TABLE = 'contracts';
    const ORDER_BY = ' order by';
    public function all(bool $isFiltered): array
    {
        $query = "SELECT id, name, nip, amount";
        $query .= " FROM " . self::DB_TABLE;
        $query .= self::getCondition($isFiltered);
        $query .= self::getSort($isFiltered);
        return $this->getData($query);
    }

    private static function getCondition(bool $isFiltered): string
    {
        return $isFiltered ? ' WHERE amount > 10' : "";
    }
    private static function getSort(bool $isFiltered): string
    {
        return $isFiltered ? self::getSortFiltered() : self::getSortUnfiltered();

    }
    private static function getSortFiltered(): string
    {
        $request = new \App\Library\Request;
        $sort = (int) $request->get('sort');

        switch ($sort) {
            case 1:
                $orderBy = self::ORDER_BY . " 2, 4 DESC";
                break;
            case 2:
                $orderBy = self::ORDER_BY . " amount";
                break;
            default:
                $orderBy = self::ORDER_BY . "  2, 4 DESC";
                break;
        }
        return $orderBy;
    }

    private static function getSortUnfiltered(): string
    {
        return self::ORDER_BY . " id";
    }

}
