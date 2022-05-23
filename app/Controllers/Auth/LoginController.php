<?php

namespace App\Controllers\Auth;

use App\Repository\Bitrix\UserRepository;
use App\Services\Auth\Authentication;
use App\Services\Auth\JWT\JWT;
use App\Services\Validation\Auth\LoginValidator;
use Core\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use App\Services\Validation\TestValidator;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends BaseController
{
     /**
     * Login
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function login(ServerRequestInterface $request): ResponseInterface
    {
        $repository = new UserRepository();

        $validator = new LoginValidator();

        $requestData = $validator->run($request)
            ->getParsedBody();

        $result = Authentication::attempt(
            $requestData["login"],
            $request->getParsedBody()["password"]
        );

        $response = false;

        $this->messages["auth"] = "failed";

        if($result){

            $this->messages["auth"] = "success";

            $user = $repository->where(["LOGIN" => $requestData["login"]]);

            $response = JWT::token($user);

        }

        return $this->jsonResponse($response);
    }
}
