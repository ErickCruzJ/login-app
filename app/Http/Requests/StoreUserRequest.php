<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nombre'=>['required', 'string', 'max:100'],
            'apellido_paterno'=>['required','string','max:100'],
            'apellido_materno'=>['nullable','string','max:100'],
            'fecha_nacimiento'=>['required','date'],
            'genero'=>['required','in:Masculino,Femenino,Otro'],
            'telefono'=>['required','string','max:20'],
            'email'=>['required', 'email', 'unique:user,email'],
            'foto'=>['nullable', 'image', 'msx:2048'],
        ];
    }
    public function messages(): array
    {
        return[
            'email.unique'=>'Este correo ya está registrado.',
            'foto.image'=>'El archivo debe ser una imagen valida.'
        ]
    }
}
