<?php

namespace App\Models\Schemas\Task;

/**
 * @OA\Schema(
 *     schema="TaskRequest",
 *     type="object",
 *     title="Task Request",
 *     description="Data required to create or update a task",
 *     required={"name", "description", "status"},
 *     @OA\Property(
 *         property="name", 
 *         type="string", 
 *         description="Task name", 
 *         example="Complete project report"
 *     ),
 *     @OA\Property(
 *         property="description", 
 *         type="string", 
 *         description="Task description", 
 *         example="Write and review the project report for submission"
 *     ),
 *     @OA\Property(
 *         property="status", 
 *         type="string", 
 *         enum={"todo", "doing", "done"}, 
 *         description="Task status", 
 *         example="todo"
 *     ),
 *     @OA\Property(
 *         property="expires_at", 
 *         type="string", 
 *         format="date-time", 
 *         description="Task expiration datetime", 
 *         example="2025-03-01T14:30:00Z"
 *     )
 * )
 */
class TaskRequest {}
