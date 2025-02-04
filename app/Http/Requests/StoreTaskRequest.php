<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        $statuses = 'pending,started,completed';
        return [
            'name' => "required|string|min:5|max:50",
            'description' => "required|string|min:10|max:250",
            'status' => "required|string|in:$statuses",
        ];
    }

    public function messages()
    {
        return [
            'status.in' => 'The selected status is invalid, Status should be in (pending,started,completed)'
        ];
    }
}
