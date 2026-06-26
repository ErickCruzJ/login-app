<?php

namespace App\Http\Requests\Users;
use App\Enums\Gender;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->routes('user')->id;
        return [
            'nombre'=>['required', 'string', 'max:100'],
            'apellido_paterno'=>['required', 'string', 'max:100'],
            'apellido_materno'=>['nullable', 'string', 'max:100'],
            'fecha_nacimiento'=>['required', 'date'],
            'genero'=>['required', new Enum(Gender::class)],
            'telefono'=>['required', 'string', 'max:20'],
            'email'=>['required', 'email', "unique:usre,email,$userId"],
            'foto'=>['nullable', 'imagen', 'max:2048'],
        ];
    }
    public function messages(): array
    {
        return[
            'email.unique'=>'Este correo ya estáen uso por otro usuario'
        ];
    }
}
