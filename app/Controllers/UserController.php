<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\UserService;
use Matrix\Http\Request;
use Matrix\Http\Response;

class UserController
{
    public function __construct(
        protected UserService $userService
    ) {}

    /**
     * 用户列表 - GET /api/user
     */
    public function index(Request $request): Response
    {
        $users = $this->userService->getAll();
        return Response::json([
            'code' => 0,
            'data' => $users,
        ]);
    }

    /**
     * 单个用户 - GET /api/user/{id}
     */
    public function show(Request $request): Response
    {
        $id   = (int) $request->route('id');
        $user = $this->userService->findById($id);

        if ($user === null) {
            return Response::json(['code' => 1, 'message' => 'User not found'], 404);
        }

        return Response::json(['code' => 0, 'data' => $user]);
    }
}
