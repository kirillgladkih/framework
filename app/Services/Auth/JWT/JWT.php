<?php

namespace App\Services\Auth\JWT;

use Bitrix\Main\Web\JWT as WebJWT;
use Core\Config\Cnf;
use Exception;

class JWT
{
    public static function token(array $data = [])
    {
        $payload = array_merge(Cnf::auth("jwt"), ["data" => $data]);

        return WebJWT::encode($payload, Cnf::auth("key"));
    }

    public static function decode(string $jwt)
    {
        try{

            $result = WebJWT::decode($jwt, Cnf::auth("key"),  array('HS256'));

        }catch(Exception $e) {

            return false;

        }

        return $result;
    }
}
