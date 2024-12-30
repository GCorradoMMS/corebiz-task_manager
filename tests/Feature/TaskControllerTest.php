<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test to get all tasks.
     */
    public function test_can_get_all_tasks()
    {
        Task::factory(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /**
     * Test to get a single task.
     */
    public function test_can_get_a_single_task()
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'status' => $task->status->value,
                'user_id' => $task->user_id,
            ]);
    }

    /**
     * Test to create a new task.
     */
    public function test_can_create_a_single_task()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'New Task',
            'description' => 'Task Description',
            'status' => 'todo',
            'expires_at' => now()->addDays(7)->format('Y-m-d H:i:s'),
            'user_id' => $user->id,
        ];

        $response = $this->postJson('/api/tasks', $data);

        $response->assertStatus(201)
            ->assertJson($data);

        $this->assertDatabaseHas('tasks', $data);
    }

    /**
     * Test to delete a task.
     */
    public function test_can_delete_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);

        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }

    /**
     * Test to update a task partially.
     */
    public function test_can_update_a_task()
    {
        $task = Task::factory()->create();
        $partialData = ['status' => 'done'];

        $response = $this->patchJson("/api/tasks/{$task->id}", $partialData);

        $response->assertStatus(200)
            ->assertJson($partialData);

        $this->assertDatabaseHas('tasks', $partialData);
    }
}
