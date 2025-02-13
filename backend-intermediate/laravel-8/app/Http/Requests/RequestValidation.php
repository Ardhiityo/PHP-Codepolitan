<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule_task_unique = Rule::unique("tasks", "task");
        if ($this->method() !== "POST") {
            $rule_task_unique->ignore($this->route()->parameter("id"));
        }

        return [
            'user' => ['required'],
            'task' => ['required', $rule_task_unique]
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute harus di isi",
            "task.required" => "Task wajib di isi",
            "user.required" => "User wajib diisi"
        ];
    }
}
