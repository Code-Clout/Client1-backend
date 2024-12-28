<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumniSpeakRequest;
use App\Http\Requests\UpdateAlumniSpeakRequest;
use App\Repositories\Interfaces\AlumniSpeakRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AlumniSpeakController extends Controller
{
    protected $repository;

    public function __construct(AlumniSpeakRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $alumni = $this->repository->all();

        if ($alumni->isEmpty()) {
            return response()->json(['message' => 'No alumni speaks found.'], 404);
        }

        return response()->json($alumni, 200);
    }

    public function show($id)
    {
        try {
            $alumni = $this->repository->find($id);
            return response()->json($alumni, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Alumni speak not found.'], 404);
        }
    }

    public function store(StoreAlumniSpeakRequest $request)
    {
        $data = $request->validated();
        $data['student_photo'] = $request->file('student_photo')->store('public/photos');
        $data['company_logo'] = $request->file('company_logo')->store('public/logos');

        $this->repository->create($data);

        return response()->json(['message' => 'Alumni speak stored successfully!'], 201);
    }

    public function update(UpdateAlumniSpeakRequest $request, $id)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('student_photo')) {
                $data['student_photo'] = $request->file('student_photo')->store('public/photos');
            }

            if ($request->hasFile('company_logo')) {
                $data['company_logo'] = $request->file('company_logo')->store('public/logos');
            }

            $alumni = $this->repository->update($id, $data);

            return response()->json(['message' => 'Alumni speak updated successfully.', 'data' => $alumni], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Alumni speak not found.'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->repository->delete($id);

            return response()->json(['message' => 'Alumni speak deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Alumni speak not found.'], 404);
        }
    }
}
