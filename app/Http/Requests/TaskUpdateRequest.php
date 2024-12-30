<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255', 
            'description' => 'sometimes|string', 
            'status' => 'sometimes|in:todo,doing,done',
            'expires_at' => 'sometimes|date|after_or_equal:today|date_format:Y-m-d H:i:s',
        ];
    }

    /**
     * Custom messages for validation errors.
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'name.string' => "name must be a valid string.",
            'status.in' => "The status field must be 'todo', 'done' or 'doing'",
            'expires_at.date' => "expires_at must be a valid date.",
            'expires_at.after_or_equal' => 'expired_date must be today or in the future.',
        ];
    }
}
