<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function can_get_all_tasks() {
        
    }

    public function can_get_a_single_tasks() {
        
    }

    public function can_create_a_single_tasks() {
        
    }

    public function can_edit_a_task() {
        
    }

    public function can_delete_a_task() {
        
    }

    public function can_update_a_task() {
        
    }
}
