<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function __construct(private TaskRepository $taskRepository) {}

    /**
     * Get all tasks.
     *
     * @return Collection
     */
    public function getAllTasks(): Collection
    {
        return $this->taskRepository->getAll();
    }

    /**
     * Get a task by ID.
     *
     * @param int $id
     * @return Task
     */
    public function getTaskById(int $id): Task
    {
        return $this->taskRepository->findById($id);
    }
    
    /**
     * Create a new task.
     *
     * @param array $data
     * @return Task
     */
    public function createTask(array $data): Task
    {
        return $this->taskRepository->create($data);
    }

    /**
     * Update an existing task.
     *
     * @param int $id
     * @param array $data
     * @return Task
     */
    public function updateTask(int $id, array $data): Task
    {
        return $this->taskRepository->update($id, $data);
    }

    /**
     * Delete a task.
     *
     * @param int $id
     * @return void
     */
    public function deleteTask(int $id): void
    {
        $this->taskRepository->delete($id);
    }
}
