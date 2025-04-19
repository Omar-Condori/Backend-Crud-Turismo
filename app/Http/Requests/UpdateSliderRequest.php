<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'imagen' => 'sometimes|string|max:255',
            'titulo' => 'sometimes|string|max:255',
            'descripcion' => 'nullable|string',
            'orden' => 'nullable|integer|min:0',
            'enlace' => 'nullable|string|max:255',
            'estado' => 'nullable|boolean',
            'autoplay' => 'nullable|boolean',
            'intervalo' => 'nullable|integer|min:0',
            'loop' => 'nullable|boolean',
        ];
    }
}