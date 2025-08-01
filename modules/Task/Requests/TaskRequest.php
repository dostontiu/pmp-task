<?php

namespace Modules\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Task\Enums\TaskStatus;

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
            'assigned_user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required',
            'name' => 'required|min:5|max:80',
            'description' => 'nullable|max:500',
            'status' => ['required', new Enum(TaskStatus::class)],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
