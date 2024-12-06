<?php
namespace App\Repositories;

use App\Models\RegistrationStudent;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function getById($id)
    {
        $student = RegistrationStudent::find($id);
        if (!$student) {
            throw new ModelNotFoundException("Student with ID {$id} not found.");
        }
        return $student;
    }
    
    public function update(int $id, array $data): bool
    {
        $student = $this->getById($id); 
        return $student->update($data); 
    }

}
