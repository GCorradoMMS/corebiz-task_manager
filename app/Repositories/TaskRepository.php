<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    /**
     * Get all tasks.
     *
     * @return mixed
     */
    public function getAll(): Collection
    {
        return Task::all();
    }
    
    /**
     * Find a task by ID.
     *
     * @param int $id
     * @return Task
     */
    public function findById(int $id): Task
    {
        return Task::findOrFail($id);
    }

    /**
     * Create a new task.
     *
     * @param array $data
     * @return Task
     */
    public function create(array $data): Task
    {
        return Task::create($data);
    }

    /**
     * Update a task.
     *
     * @param int $id
     * @param array $data
     * @return Task
     */
    public function update(int $id, array $data): Task
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        // dd($data, $task);
        return $task;
    }

    /**
     * Delete a task.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}

