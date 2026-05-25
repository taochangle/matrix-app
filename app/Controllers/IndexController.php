<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use DebugBar\StandardDebugBar;
use Matrix\View\Twig;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    /**
     * GET / — 首页：Eloquent 查询 + Twig 渲染。
     */
    public function index(Request $request, StandardDebugBar $debugBar, Twig $twig): Response
    {
        // 种子数据（表为空时自动填充）
        if (User::count() === 0) {
            $debugBar['messages']->info('自动填充演示数据...');
            $dt = date('Y-m-d H:i:s');
            User::insert([
                ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => password_hash('secret', PASSWORD_BCRYPT), 'created_at' => $dt, 'updated_at' => $dt],
                ['name' => 'Bob',   'email' => 'bob@example.com',   'password' => password_hash('secret', PASSWORD_BCRYPT), 'created_at' => $dt, 'updated_at' => $dt],
                ['name' => 'Carol', 'email' => 'carol@example.com', 'password' => password_hash('secret', PASSWORD_BCRYPT), 'created_at' => $dt, 'updated_at' => $dt],
                ['name' => 'Dave',  'email' => 'dave@example.com',  'password' => password_hash('secret', PASSWORD_BCRYPT), 'created_at' => $dt, 'updated_at' => $dt],
            ]);
        }

        $users = User::all();

        $debugBar['messages']->info('查询了 ' . count($users) . ' 条用户记录');
        $debugBar['time']->startMeasure('twig_render', 'Twig Render');

        $html = $twig->renderToString('home.html.twig', [
            'title'   => 'Matrix Framework',
            'message' => '一个现代化的 PHP 微框架',
            'users'   => $users,
        ]);

        $debugBar['time']->stopMeasure('twig_render');

        return new Response($html);
    }
}
