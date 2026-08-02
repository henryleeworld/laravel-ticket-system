<?php

namespace App\Http\Requests;

use Coderflex\LaravelTicket\Enums\Priority;
use Coderflex\LaravelTicket\Enums\Status;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TicketRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string'],
            'message'     => ['required', 'string'],
            'categories'  => ['array', 'exists:categories,id'],
            'labels'      => ['array', 'exists:labels,id'],
            'priority'    => ['required', new Enum(Priority::class)],
            'status'      => ['nullable', new Enum(Status::class)],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
            'attachments' => ['nullable', 'array'],
        ];
    }
}
