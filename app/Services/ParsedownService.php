<?php

namespace App\Services;

use Parsedown;

class ParsedownService
{

    public static function toHTML($text)
    {
        return Parsedown::instance()
            ->setMarkupEscaped(true)
            ->text($text);
    }
}
