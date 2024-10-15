<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
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
            'campaign_id' => ['required', 'exists:campaigns,id'],
            'organization_id' => ['required', 'exists:organizations,id'],
            'amount' => ['required', 'numeric'],
            'from_address' => ['required', 'string'],
            'to_address' => ['required', 'string'],
            'transaction_hash' => ['required', 'string'],
        ];
    }
}
