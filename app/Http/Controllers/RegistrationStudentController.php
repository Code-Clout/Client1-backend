<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStudentRequest;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistrationConformationMail;
use App\Mail\StudentTestMail;
use App\Mail\EnrolledStudentsConformationMail;

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
            // Handle file upload
            if ($request->hasFile('payment_screenshot')) {
                $file = $request->file('payment_screenshot');
                $filePath = $file->store('payment_screenshots', 'public'); // Save file to the 'storage/app/public/payment_screenshots' directory
            } else {
                $filePath = null;
            }

            // Add file path to request data
            $data = $request->validated();
            $data['payment_screenshot'] = $filePath;

            // Save student data
            $student = $this->registrationStudentRepository->create($data);

            // Send confirmation email
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
            Mail::to($student->email)->send(new StudentTestMail($student->first_name, $student->last_name, 'fbsedu.in/test'));
    
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

    public function getStudentsWithScore()
    {
        try {
            $students = $this->registrationStudentRepository->getStudentsWithScore();

            if ($students->isEmpty()) {
                return response()->json(['message' => 'No students with a score found.'], 404);
            }

            return response()->json(['data' => $students], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching students with scores.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function enrollStudent($id)
    {
        try {
            // Update the enrollment status via the repository
            $updated = $this->registrationStudentRepository->updateEnrolledStatus($id, 1);

            // If the update failed
            if (!$updated) {
                return response()->json(['message' => 'Unable to enroll the student.'], 400);
            }

            // Retrieve the student details
            $student = $this->registrationStudentRepository->getById($id);

            // If the student doesn't exist
            if (!$student) {
                return response()->json(['message' => 'Student not found.'], 404);
            }

            // Send email confirmation
            Mail::to($student->email)->send(new EnrolledStudentsConformationMail($student));

            // Return a success response
            return response()->json([
                'message' => 'Student successfully enrolled and email sent.',
                'student' => $student
            ], 200);
        } catch (Exception $e) {
            // Handle any exceptions
            return response()->json([
                'message' => 'An error occurred while enrolling the student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    public function getAllEnrolledStudents()
    {
        try {
            $students = $this->registrationStudentRepository->getAllEnrolledStudents();

            if ($students->isEmpty()) {
                return response()->json(['message' => 'No enrolled students found.'], 404);
            }

            return response()->json(['data' => $students], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching enrolled students.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllverifiedStudents(){
        try {
            $verifiedStudents =$this->registrationStudentRepository->getAllverifiedStudents();

            if($verifiedStudents->isEmpty()){
                return response()->json(['message'=>'Data Not Found'],404);
            }
            return response()->json(['data'=>$verifiedStudents],200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching verified students.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
