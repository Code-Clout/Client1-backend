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

    public function getStudentsWithScore()
    {
        return RegistrationStudent::whereNotNull('score')->get();
    }

    public function updateEnrolledStatus(int $id, int $status): bool
    {
        $student = $this->getById($id);
        return $student->update(['enrolled_students' => $status]);
    }

    public function getAllEnrolledStudents()
    {
        return RegistrationStudent::where('enrolled_students', 1)->get();
    }

    public function getAllverifiedStudents()
    {
        return RegistrationStudent::where('verify',1)->get();
    }

}
