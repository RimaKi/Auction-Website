<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class AuctionRequest extends FormRequest
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
        if (Request::method() == 'POST') {
            return [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
            ];
        } else {
            return [];
        }
    }
}
