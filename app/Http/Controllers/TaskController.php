<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;

/**
 * @OA\Info(
 *     title="TaskManager API",
 *     version="1.0.0",
 *     description="This is the API documentation for the TaskManager API."
 * )
 * 
 * @OA\Server(
 *     url="http://localhost/api",
 *     description="Local TaskManager API Server."
 * )
 */
class TaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}

    /**
     * Get all tasks.
     *
     * @OA\Get(
     *     path="api/tasks",
     *     summary="Retrieve all tasks",
     *     description="Get a list of all tasks.",
     *     tags={"Tasks"},
     *     @OA\Response(
     *         response=200,
     *         description="List of tasks",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Task"))
     *     )
     * )
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
     * @OA\Post(
     *     path="/tasks",
     *     summary="Create a new task",
     *     description="Create a new task by providing necessary data",
     *     operationId="createTask",
     *     tags={"Tasks"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 ref="#/components/schemas/TaskRequest",
     *                 example={
     *                     "name": "Complete project report",
     *                     "description": "Write and review the project report for submission",
     *                     "status": "todo",
     *                     "expires_at": "2025-03-01T14:30:00Z"
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Task created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
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
     * @OA\Get(
     *     path="api/tasks/{id}",
     *     summary="Get a specific task",
     *     description="Retrieve details of a specific task by its ID.",
     *     tags={"Tasks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the task",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Task details",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Task not found"
     *     )
     * )
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
     * @OA\Put(
     *     path="/tasks/{id}",
     *     summary="Update an existing task",
     *     description="Update an existing task by providing the task ID and new data",
     *     operationId="updateTask",
     *     tags={"Tasks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the task to update",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 ref="#/components/schemas/TaskUpdateRequest",
     *                 example={
     *                     "name": "Updated task name",
     *                     "description": "Updated description of the task",
     *                     "status": "doing",
     *                     "expires_at": "2025-04-01T10:00:00Z"
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Task updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Task not found"
     *     )
     * )
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
     * @OA\Delete(
     *     path="api/tasks/{id}",
     *     summary="Delete a task",
     *     description="Delete a specific task by its ID.",
     *     tags={"Tasks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the task",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Task deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Task not found"
     *     )
     * )
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
