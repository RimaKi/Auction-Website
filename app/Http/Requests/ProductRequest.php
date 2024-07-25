<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ProductRequest extends FormRequest
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
                'auction_id' => ['required', 'exists:auctions,id'],
                'name' => ['required', 'string'],
                'description' => ['string'],
                'link' => ['required', 'string'],
                'type_id' => ['required', 'numeric', 'exists:types,id'],
                'bid_amount' => ['required', 'numeric'],
                'min_price' => ['required', 'numeric'],
                'closing_price' => ['numeric'],
                'reach_rate' => ['numeric'],
                'files' => ['array', 'required'],
                'files.*' => ['file'],
            ];
        } else {
            return [
                'name' => ['required', 'string'],
                'description' => ['required', 'string'],
                'link' => ['required', 'string'],
                'type_id' => ['required', 'numeric', 'exists:types,id'],
                'bid_amount' => ['required', 'numeric'],
                'min_price' => ['required', 'numeric'],
                'closing_price' => ['numeric'],
                'reach_rate' => ['numeric'],
            ];
        }
    }
}
