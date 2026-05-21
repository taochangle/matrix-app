<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use DebugBar\StandardDebugBar;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    /**
     * GET /api/users — 获取所有用户（需要 JWT 鉴权）。
     */
    public function index(Request $request, StandardDebugBar $debugBar): Response
    {
        $debugBar['messages']->info('正在查询用户列表...');

        // 模拟业务耗时
        usleep(150000);

        $authUser = $request->attributes->get('auth_user');

        // Eloquent 查询（DebugBar 自动捕获 SQL）
        $users = User::all();

        $debugBar['messages']->info('查询完成，共 ' . count($users) . ' 条记录');

        $debugBar['time']->start('json_encode_users');
        $data = ['code' => 0, 'data' => $users, 'auth_user' => $authUser];
        $debugBar['time']->stop('json_encode_users');

        return new JsonResponse($data);
    }

    /**
     * GET /api/user/{id:\d+}
     */
    public function show(Request $request): Response
    {
        $id   = (int) $request->attributes->get('id');
        $user = User::find($id);

        if ($user === null) {
            return new JsonResponse([
                'code'    => 1,
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse([
            'code' => 0,
            'data' => $user,
        ]);
    }
}
