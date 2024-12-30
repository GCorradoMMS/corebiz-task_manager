<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}

    /**
     * Get all tasks.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json($tasks);
    }

    /**
     * Store a new task.
     *
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function store(TaskRequest $request): JsonResponse
    {
        $task = $this->taskService->createTask($request->validated());
        return response()->json($task, 201);
    }

    /**
     * Get a specific task by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $task = $this->taskService->getTaskById($id);
        return response()->json($task);
    }

    /**
     * Update a task.
     *
     * @param TaskUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TaskUpdateRequest $request, int $id): JsonResponse
    {
        $task = $this->taskService->updateTask($id, $request->validated());
        return response()->json($task);
    }

    /**
     * Delete a task.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->taskService->deleteTask($id);
        return response()->json(null, 204);
    }
}
