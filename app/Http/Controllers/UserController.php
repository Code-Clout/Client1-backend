<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function updateUser(UserRequest $request, int $id): JsonResponse
    {
        $user = $this->userRepository->update($id, $request->validated());
        return $user ? response()->json(['message' => 'User updated successfully.', 'data' => $user])
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

        return response()->json(['message' => 'Login successful', 'token' => $token]);
    }
}
