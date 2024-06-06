<?php

namespace App\Library;

class ErrorMessage
{
    const NOT_FOUND_MSG = "Nie znaleziono danych.";
    private static $titles = [
        'info' => 'Komunikat',
        'success' => 'Komunikat',
        'warning' => 'Uwaga!',
        'error' => 'Uwaga!'
    ];
    private static $classes = [
        'info' => 'info',
        'success' => 'success',
        'warning' => 'warning',
        'error' => 'danger'
    ];

    public static function showErrMsg($msg, $err = '')
    {
        $template = new Template();
        $title = self::$titles[$err];
        $class = self::$classes[$err];

        return $template->render(
            'common/alert',
            [
                'title' => $title,
                'class' => $class,
                'msg' => $msg
            ]
        );
    }
    public static function dataNotFoundMsg()
    {
        return self::showErrMsg(self::NOT_FOUND_MSG, 'info');
    }
}
