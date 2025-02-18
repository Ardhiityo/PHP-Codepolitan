<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        return $this->merge(['sender_id' => Auth::user()->id]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender_id' => ['required', 'exists:users,id'],
            'receiver_id' => ['required', 'exists:users,id'],
            'content' => ['required']
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response(['error' => $validator->getMessageBag()], 400));
    }
}
