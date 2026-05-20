<?php

declare(strict_types=1);

namespace App\Services;

class UserService
{
    /**
     * 获取所有用户假数据。
     *
     * @return array<int, array<string, mixed>>
     */
    public function getAll(): array
    {
        return [
            ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
            ['id' => 2, 'name' => 'Bob',   'email' => 'bob@example.com'],
            ['id' => 3, 'name' => 'Carol', 'email' => 'carol@example.com'],
        ];
    }

    /**
     * 根据 ID 查找用户。
     *
     * @return array<string, mixed>|null
     */
    public function findById(int $id): ?array
    {
        foreach ($this->getAll() as $user) {
            if ($user['id'] === $id) {
                return $user;
            }
        }
        return null;
    }
}
