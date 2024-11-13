<?php

namespace App\Repositories\Interfaces;

use App\Models\RegistrationStudent;

interface RegistrationStudentRepositoryInterface
{
    public function create(array $data): RegistrationStudent;
    public function getAll();
    public function softDelete(int $id): bool;
}
