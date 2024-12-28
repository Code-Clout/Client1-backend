<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreRecognitionAndApprovalRequest;
use App\Http\Requests\UpdateRecognitionAndApprovalRequest;
use App\Repositories\Interfaces\RecognitionAndApprovalRepositoryInterface;
use Illuminate\Http\JsonResponse;

class RecognitionAndApprovalController extends Controller
{
    protected $repository;

    public function __construct(RecognitionAndApprovalRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        try{
        $records = $this->repository->all();
        return response()->json($records, 200);}
        catch (\Exception $e) {
            return response()->json(['message' => 'Records not found.'], 404);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $record = $this->repository->find($id);
            return response()->json($record, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Record not found.'], 404);
        }
    }

    public function store(StoreRecognitionAndApprovalRequest $request): JsonResponse
    {
        try {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('public/recognition_approvals');
        $record = $this->repository->create($data);

        return response()->json(['message' => 'Record created successfully.', 'data' => $record], 201);}
        catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the record.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateRecognitionAndApprovalRequest $request, $id): JsonResponse
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('public/recognition_approvals');
            }

            $record = $this->repository->update($id, $data);
            return response()->json(['message' => 'Record updated successfully.', 'data' => $record], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Record not found.'], 404);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->repository->delete($id);
            return response()->json(['message' => 'Record deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Record not found.'], 404);
        }
    }
}
