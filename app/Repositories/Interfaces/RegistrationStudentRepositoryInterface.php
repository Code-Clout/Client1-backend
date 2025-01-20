<?php

namespace App\Repositories\Interfaces;

use App\Models\RegistrationStudent;

interface RegistrationStudentRepositoryInterface
{
    public function create(array $data): RegistrationStudent;
    public function getAll();
    public function softDelete(int $id): bool;
    public function getById($id); 
    public function update(int $id, array $data): bool;
    public function getStudentsWithScore();
    public function updateEnrolledStatus(int $id, int $status): bool;
    public function getAllEnrolledStudents();
    public function getAllverifiedStudents();

}
