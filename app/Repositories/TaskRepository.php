<?php
namespace App\Repositories;

use App\Models\TaskAssignment;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function createTask(array $data): TaskAssignment
    {
        return TaskAssignment::create($data);
    }

    public function updateTaskStatus(int $id, string $status): TaskAssignment
    {
        $task = TaskAssignment::findOrFail($id);
        $task->task_status = $status;
        $task->save();

        return $task;
    }

    public function getAllTasksForCounsellor(int $userId): array
    {
        return TaskAssignment::where('user_id', $userId)->get()->toArray();
    }

    public function getTaskSummary(): array
    {
        $tasks = TaskAssignment::selectRaw('task_status, COUNT(*) as count')
            ->groupBy('task_status')
            ->get();

        return $tasks->toArray();
    }

    public function getTaskCountForCounsellor(int $userId): array
    {
        $taskCounts = TaskAssignment::where('user_id', $userId)
            ->selectRaw('task_status, COUNT(*) as count')
            ->groupBy('task_status')
            ->get();

        return $taskCounts->toArray();
    }
}
