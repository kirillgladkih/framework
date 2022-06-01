<?php

namespace Core\Helpers;

class Url
{
    /**
     * Удаляет слеши в начале и конце
     *
     * @param string $url
     * @return string
     */
    public static function cleanUrl(string $url) : string
    {
        return preg_replace("/^\/|\/$/", "", $url);
    }
    /**
     * Сравнивает урлы
     *
     * @param string $pattern
     * @param string $url
     * @return bool
     */
    public static function compareUrl(string $pattern, string $url) : bool
    {
        $pattern = self::cleanUrl($pattern);

        $url = self::cleanUrl($url);

        return preg_match("/^$pattern$/", $url);
    }
}
