<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStudentRequest;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use Illuminate\Http\Request;

class RegistrationStudentController extends Controller
{
    protected $registrationStudentRepository;

    public function __construct(RegistrationStudentRepositoryInterface $registrationStudentRepository)
    {
        $this->registrationStudentRepository = $registrationStudentRepository;
    }

    public function create(RegistrationStudentRequest $request)
    {
        $student = $this->registrationStudentRepository->create($request->validated());
        return response()->json(['message' => 'Student registered successfully', 'data' => $student], 201);
    }

    public function index()
    {
        $students = $this->registrationStudentRepository->getAll();
        return response()->json(['data' => $students], 200);
    }

    public function softDelete($id)
    {
        $deleted = $this->registrationStudentRepository->softDelete($id);
        return response()->json(['message' => 'Student soft deleted successfully'], 200);
    }
}
