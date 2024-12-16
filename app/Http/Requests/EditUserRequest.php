<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable', 'string', Rules\Password::defaults()],
            'role'     => ['required', 'integer', 'exists:roles,id'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
