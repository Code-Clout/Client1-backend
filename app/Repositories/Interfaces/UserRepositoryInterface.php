<?php

namespace App\Repositories\Interfaces;


use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function getAll(): array;
    public function getById(int $id): ?User;
    public function update(int $id, array $data): ?User;
    public function delete(int $id): bool;
    public function findByEmail(string $email): ?User;
    public function getAllCounsullors(): array;
}
