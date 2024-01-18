<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdresseRequest extends FormRequest
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
            'numero' => ['nullable'],
            'immeuble' => ['nullable'],
            'rue' => ['required', 'max:150'],
            'codePostal' => ['required'],
            'ville' => ['required'],
            'pays' => ['nullable'],
        ];
    }
}
