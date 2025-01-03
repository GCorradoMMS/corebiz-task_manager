<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

use Database\Factories\TaskFactory;
use App\Models\Enum\TaskStatus;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'user_id',
        'expires_at'
    ];

    
    /**
     * Casts.
     *
     * @var list<string>
     */
    protected $casts = [
        'status' => TaskStatus::class,
    ];

    
    /**
     * Model attributes.
     *
     * @var list<string>
     */
    protected $attributes = [
        'status' => 'todo',
    ];

    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
