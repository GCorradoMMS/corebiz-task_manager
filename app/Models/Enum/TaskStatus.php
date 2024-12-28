<?php

namespace App\Models\Enum;

enum TaskStatus: string
{
    case DONE = 'done';
    case DOING = 'doing';
    case TODO = 'todo';
}