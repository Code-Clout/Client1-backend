<?php
namespace App\Repositories;

use App\Models\PlacedStudent;
use App\Repositories\Interfaces\PlacedStudentRepositoryInterface;

class PlacedStudentRepository implements PlacedStudentRepositoryInterface
{
    public function all()
    {
        return PlacedStudent::all();
    }

    public function find($id)
    {
        return PlacedStudent::findOrFail($id);
    }

    public function create(array $data)
    {
        return PlacedStudent::create($data);
    }

    public function update($id, array $data)
    {
        $student = $this->find($id);
        $student->update($data);
        return $student;
    }

    public function delete($id)
    {
        $student = $this->find($id);
        return $student->delete();
    }
}
