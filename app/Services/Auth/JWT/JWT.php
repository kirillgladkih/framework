<?php

namespace App\Services\Auth\JWT;

use Bitrix\Main\Web\JWT as WebJWT;
use Core\Config\Cnf;
use Exception;

class JWT
{
    public static array $allowedAgs = ["HS256"];

    public static function token(array $data = [])
    {
        $payload = array_merge(
            Cnf::auth("jwt"),
            ["data" => $data]
        );

        return WebJWT::encode($payload, Cnf::auth("key"));
    }

    public static function validate(string $jwt)
    {
        try{

            $result = WebJWT::decode(
                $jwt,
                Cnf::auth("key"),
                self::$allowedAgs
            );

        }catch(Exception $e) {
            return false;
        }

        return $result;
    }
}
