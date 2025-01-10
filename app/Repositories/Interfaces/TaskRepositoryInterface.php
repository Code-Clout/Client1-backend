<?php

namespace App\Repositories\Interfaces;

use App\Models\TaskAssignment;

interface TaskRepositoryInterface
{
    public function createTask(array $data): TaskAssignment;

    public function updateTaskStatus(int $id, string $status): TaskAssignment;

    public function getAllTasksForCounsellor(int $userId): array;

    public function getTaskSummary(): array;
}
