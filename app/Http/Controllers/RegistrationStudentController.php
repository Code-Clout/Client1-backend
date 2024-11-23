<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStudentRequest;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistrationConformationMail;

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
        $firstName = $student->first_name;
        $lastName = $student->last_name;
        $studentEmail = $student->email;
        $paymentLink = 'https://example.com/payment'; 

        Mail::to($studentEmail)->send(new StudentRegistrationConformationMail($firstName, $lastName, $paymentLink));

        return response()->json([
            'message' => 'Student registered successfully, confirmation email sent.',
            'data' => $student
        ], 201);
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
