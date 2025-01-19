<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentEnquiry;
use App\Models\RegistrationStudent;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(UserRequest $request): JsonResponse
    {
        $user = $this->userRepository->create($request->validated());
        return response()->json(['message' => 'User created successfully.', 'data' => $user], 201);
    }

    public function getAllUsers(): JsonResponse
    {
        $users = $this->userRepository->getAll();
        return response()->json(['data' => $users]);
    }

    public function getUser(int $id): JsonResponse
    {
        $user = $this->userRepository->getById($id);
        return $user ? response()->json(['data' => $user]) : response()->json(['message' => 'User not found.'], 404);
    }

    public function updateUser(UpdateUserRequest $request, int $id): JsonResponse
    {
        $validatedData = $request->validated();
        \Log::info('Validated Data:', $validatedData);
        $user = $this->userRepository->update($id, $validatedData);
    
        return $user
            ? response()->json(['message' => 'User updated successfully.', 'data' => $user])
            : response()->json(['message' => 'User not found.'], 404);
    }    

    public function deleteUser(int $id): JsonResponse
    {
        $deleted = $this->userRepository->delete($id);
        return $deleted ? response()->json(['message' => 'User deleted successfully.'])
                        : response()->json(['message' => 'User not found.'], 404);
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);
    
        $user = $this->userRepository->findByEmail($request->email);
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user 
        ]);
    }

    public function getDashboardSummary(): JsonResponse
    {
        try {
            $enquiries = StudentEnquiry::select('id', 'created_at')->get();
            $totalEnquiries = $enquiries->count();
            $registeredStudents = RegistrationStudent::select('id', 'created_at')->get();
            $totalRegisteredStudents = $registeredStudents->count();
            if ($totalEnquiries === 0 && $totalRegisteredStudents === 0) {
                return response()->json([
                    'message' => 'No enquiries or registered students found.'
                ], 404);
            }
            return response()->json([
                'total_enquiries' => $totalEnquiries,
                'enquiries' => $enquiries,
                'total_registered_students' => $totalRegisteredStudents,
                'registered_students' => $registeredStudents
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the dashboard summary.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function getAllCounsullors(){
       $counsullors = $this->userRepository->getAllCounsullors();
       if(!$counsullors){
        return response()->json(["Data Not Found"],404);
       }

       return response()->json(['data'=> $counsullors]);

    }
    
}
