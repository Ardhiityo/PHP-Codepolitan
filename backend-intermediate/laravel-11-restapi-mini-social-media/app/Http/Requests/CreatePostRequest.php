<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePostRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge(['user_id' => Auth::user()->id]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['required'],
            'image' => ['nullable'],
            'user_id' => ['required', 'exists:users,id'],
            'comment_id' => ['exists:comments,id'],
            'like_id' => ['exists:likes,id']
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response(['errors' => $validator->getMessageBag()], 400));
    }
}
