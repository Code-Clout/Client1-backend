<?php
namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\TaskAssignment;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function assignTask(Request $request): JsonResponse
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'task_description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $task = $this->taskRepository->createTask(array_merge($request->all(), [
            'assigned_by' => auth()->id(),
        ]));

        return response()->json(['message' => 'Task assigned successfully', 'data' => $task], 201);
    }

    public function updateTaskStatus(Request $request, int $taskId): JsonResponse
    {
        $request->validate([
            'task_status' => 'required|in:To do,In progress,Done',
        ]);

        $task = $this->taskRepository->updateTaskStatus($taskId, $request->input('task_status'));

        return response()->json(['message' => 'Task status updated successfully', 'data' => $task], 200);
    }

    public function getTasksForCounsellor(int $userId): JsonResponse
    {
        $tasks = $this->taskRepository->getAllTasksForCounsellor($userId);

        return response()->json(['data' => $tasks], 200);
    }

    public function getTaskCountForCounsellor(int $userId): JsonResponse
    {
        $taskCounts = $this->taskRepository->getTaskCountForCounsellor($userId);

        return response()->json([
            'message' => 'Task count for counsellor retrieved successfully.',
            'data' => $taskCounts,
        ], 200);
    }

    public function getTaskSummary(): JsonResponse
    {
        $summary = $this->taskRepository->getTaskSummary();

        // Get total count of all tasks
        $totalTasks = TaskAssignment::count();

        return response()->json([
            'message' => 'Task summary retrieved successfully.',
            'data' => $summary,
            'total_tasks' => $totalTasks,
        ], 200);
    }
}
