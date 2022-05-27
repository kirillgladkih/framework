<?php

namespace App\Services\Auth\Providers;

use Bitrix\Main\Web\JWT;
use Core\Config\Cnf as Config;
use App\Services\Auth\Providers\AuthProvider;
/**
 * Jwt provider
 */
class JwtAuthProvider extends AuthProvider
{
    /**
     * Получить токен
     *
     * @param array $data
     * @return string
     */
    public static function getToken(array $data = []): string
    {
        $payload = array_merge(
            Config::auth("jwt")["secure"],
            ["data" => $data]
        );

        return JWT::encode(
            $payload,
            Config::auth("jwt")["key"]
        );
    }
    /**
     * Валидация токена
     *
     * @param string $jwt
     * @return mixed
     */
    public static function validate(string $jwt): mixed
    {
        try {

            $result = JWT::decode(
                $jwt,
                Config::auth("jwt")["key"],
                Config::auth("jwt")["allowedAlgs"]
            );

        } catch (\Exception $e) {

            return false;

        }

        return $result;
    }
}
