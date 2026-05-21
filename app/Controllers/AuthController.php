<?php

declare(strict_types=1);

namespace App\Controllers;

use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController
{
    /**
     * POST /login — 签发 JWT Token。
     */
    public function login(): Response
    {
        $secret    = $_ENV['JWT_SECRET'] ?? 'matrix-secret-key';
        $algorithm = 'HS256';

        $payload = [
            'sub'   => 1,
            'name'  => 'Matrix User',
            'email' => 'user@matrix.local',
            'iat'   => time(),
            'exp'   => time() + 3600,
        ];

        $token = JWT::encode($payload, $secret, $algorithm);

        return new JsonResponse([
            'code'        => 0,
            'access_token' => $token,
            'token_type'  => 'Bearer',
            'expires_in'  => 3600,
        ]);
    }
}
