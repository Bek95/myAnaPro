<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:240',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|string|max:240',
            'confirm_password' => 'required|string|max:240',
        ];
    }
}
