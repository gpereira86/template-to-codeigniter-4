<?php

if (!function_exists('remover_acentos')) {
    function remover_acentos($string)
    {
        return preg_replace(
            '/[^A-Za-z0-9\- ]/',
            '',
            iconv('UTF-8', 'ASCII//TRANSLIT', $string)
        );
    }
}