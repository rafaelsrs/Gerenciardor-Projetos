<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateActivityRequest extends FormRequest
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
            'nm_atividade' => 'required|string|max:255',
            'cd_projeto' => 'required|integer',
            'data_ini' => 'nullable|date',
            'data_fim' => 'nullable|date',
            'is_finalizada' => 'boolean',
        ];
    }
}
