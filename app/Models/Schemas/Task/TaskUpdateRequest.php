<?php

namespace App\Models\Schemas\Task;

/**
 * @OA\Schema(
 *     schema="TaskUpdateRequest",
 *     type="object",
 *     title="Task Update Request",
 *     description="Data to update a task",
 *     @OA\Property(
 *         property="name", 
 *         type="string", 
 *         description="Task name", 
 *         example="Updated task name"
 *     ),
 *     @OA\Property(
 *         property="description", 
 *         type="string", 
 *         description="Task description", 
 *         example="Updated description of the task"
 *     ),
 *     @OA\Property(
 *         property="status", 
 *         type="string", 
 *         enum={"todo", "doing", "done"}, 
 *         description="Task status", 
 *         example="doing"
 *     ),
 *     @OA\Property(
 *         property="expires_at", 
 *         type="string", 
 *         format="date-time", 
 *         description="Task expiration datetime", 
 *         example="2025-04-01T10:00:00Z"
 *     )
 * )
 */
class TaskUpdateRequest {}

