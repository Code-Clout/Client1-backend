<?php

namespace App\Repositories;

use App\Models\RegistrationStudent;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;

class RegistrationStudentRepository implements RegistrationStudentRepositoryInterface
{
    public function create(array $data): RegistrationStudent
    {
        return RegistrationStudent::create($data);
    }

    public function getAll()
    {
        return RegistrationStudent::all();
    }

    public function softDelete(int $id): bool
    {
        $student = RegistrationStudent::findOrFail($id);
        return $student->delete();
    }
}
