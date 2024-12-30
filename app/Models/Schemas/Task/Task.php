<?php

namespace App\Models\Schemas\Task;

/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     title="Task",
 *     description="Represents a single task",
 *     required={"id", "name", "description", "status"},
 *     @OA\Property(property="id", type="integer", description="Task ID", example=1),
 *     @OA\Property(property="name", type="string", description="Task name", example="Complete project report"),
 *     @OA\Property(property="description", type="string", description="Task description", example="Write and review the project report for submission"),
 *     @OA\Property(property="status", type="string", enum={"todo", "doing", "done"}, description="Task status", example="todo"),
 *     @OA\Property(property="expires_at", type="string", format="date-time", description="Task expiration datetime", example="2025-03-01T14:30:00Z"),
 *     @OA\Property(property="user_id", type="integer", description="ID of the user who owns the task", example=42),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Task creation datetime", example="2025-01-01T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Task last update datetime", example="2025-01-01T10:30:00Z"),
 *     @OA\Property(property="deleted_at", type="string", format="date-time", nullable=true, description="Task deletion datetime", example=null)
 * )
 */
class Task {}

