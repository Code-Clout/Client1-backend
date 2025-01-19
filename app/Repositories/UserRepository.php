<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function getAll(): array
    {
        return User::all()->toArray();
    }

    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function update(int $id, array $data): ?User
    {
        $user = $this->getById($id);
        if ($user) {
            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            $user->update($data);
        }
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = $this->getById($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function getAllCounsullors(): array
    {
        return User::where('role_type', 1)->get()->toArray();
    }
}
