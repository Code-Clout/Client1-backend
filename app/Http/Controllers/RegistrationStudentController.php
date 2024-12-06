<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStudentRequest;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistrationConformationMail;
use App\Mail\StudentTestMail;

use Exception;

class RegistrationStudentController extends Controller
{
    protected $registrationStudentRepository;

    public function __construct(RegistrationStudentRepositoryInterface $registrationStudentRepository)
    {
        $this->registrationStudentRepository = $registrationStudentRepository;
    }

    public function create(RegistrationStudentRequest $request)
    {
        try {
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
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while registering the student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $students = $this->registrationStudentRepository->getAll();

            if ($students->isEmpty()) {
                return response()->json(['message' => 'No students found.'], 404);
            }

            return response()->json(['data' => $students], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching students.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function softDelete($id)
    {
        try {
            $deleted = $this->registrationStudentRepository->softDelete($id);

            if (!$deleted) {
                return response()->json(['message' => 'Student not found or already deleted.'], 404);
            }

            return response()->json(['message' => 'Student soft deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Student not found.'], 404);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyStudent($id)
    {
        try {
            $this->registrationStudentRepository->update($id, ['verify' => 1]);
    
            $student = $this->registrationStudentRepository->getById($id);
    
            // Send the confirmation email
            Mail::to($student->email)->send(new StudentTestMail($student->first_name, $student->last_name, 'https://example.com/payment'));
    
            return response()->json([
                'message' => 'Student verified and confirmation email sent.',
                'data' => $student
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Student not found.'], 404);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while verifying the student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    



    public function show($id)
    {
        try {
            $student = $this->registrationStudentRepository->getById($id);
            return response()->json($student, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Student not found.'], 404);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
