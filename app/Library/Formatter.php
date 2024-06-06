<?php

namespace App\Library;


class Formatter
{

    public static function dateFormat(string $date): string
    {
        return date('Y-d-m', strtotime($date));
    }

}
