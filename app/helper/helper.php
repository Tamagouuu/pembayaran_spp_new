<?php

class Helper
{

    public static function redirect($path)
    {
        header("Location:" . BASEURL . $path);
        exit;
    }

    public static function formatRupiah($nominal)
    {
        $fmt = numfmt_create('id-ID', NumberFormatter::CURRENCY);
        return numfmt_format($fmt, $nominal);
    }

    public static function baseURL($url)
    {
        return BASEURL . "$url";
    }
}
