<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:todo,doing,done',
            'expires_at' => 'required|date|after_or_equal:today|date_format:Y-m-d H:i:s',
            'user_id' => 'sometimes|integer',
        ];
    }

    
    /**
     * Custom messages for validation errors.
     * 
     * @return array
     */
    public function messages(): array
    {
        $message = " field is necessary.";

        return [
            'name.required' => "name" . $message,
            'description.required' => "description" . $message,
            'status.required' => "status" . $message,
            'status.in' => "The status field must be 'todo', 'done' or 'doing'",
            'user_id.integer' => "The user_field is not a valid integer",
            'expires_at.required' => "expires_at" . $message,
            'expires_at.date' => "expires_at must be a valid date.",
            'expires_at.after_or_equal' => 'expired_date must be today or in the future.',
        ];
    }
}
