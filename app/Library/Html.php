<?php
namespace App\Library;

class Html
{

    public function td_wrap($val)
    {
        return "<td>$val</td>";
    }

    public function th_wrap($val)
    {
        return "<th>$val</th>";
    }

    public function tr_wrap($val)
    {
        return "<tr>$val</tr>";
    }
    public function table_cols2($colHeader, $sortPath = null): string
    {
        $tableHead = "<thead>";
        $tableHead .= "<tr>";
        for ($i = 0; $i < count($colHeader); $i++) {
            $tableHead .= "<th align=left>$colHeader[$i]</th>";
        }
        $tableHead .= "</tr>";
        $tableHead .= "</thead>";
        return $tableHead;
    }
}