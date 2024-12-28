<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePlacedStudentRequest;
use App\Http\Requests\UpdatePlacedStudentRequest;
use App\Repositories\Interfaces\PlacedStudentRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlacedStudentController extends Controller
{
    protected $repository;

    public function __construct(PlacedStudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $students = $this->repository->all();

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No placed students found.'], 404);
        }

        return response()->json($students, 200);
    }

    public function show($id)
    {
        try {
            $student = $this->repository->find($id);
            return response()->json($student, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Placed student not found.'], 404);
        }
    }

    public function store(StorePlacedStudentRequest $request)
    {
        $data = $request->validated();
        $data['student_photo'] = $request->file('student_photo')->store('public/photos');
        $data['company_logo'] = $request->file('company_logo')->store('public/logos');

        $this->repository->create($data);

        return response()->json(['message' => 'Placed student created successfully!'], 201);
    }

    public function update(UpdatePlacedStudentRequest $request, $id)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('student_photo')) {
                $data['student_photo'] = $request->file('student_photo')->store('public/photos');
            }

            if ($request->hasFile('company_logo')) {
                $data['company_logo'] = $request->file('company_logo')->store('public/logos');
            }

            $student = $this->repository->update($id, $data);

            return response()->json(['message' => 'Placed student updated successfully.', 'data' => $student], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Placed student not found.'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->repository->delete($id);

            return response()->json(['message' => 'Placed student deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Placed student not found.'], 404);
        }
    }
}
