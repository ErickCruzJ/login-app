<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    piublic fuction execute(array $data): User
    {
        $data['name'] = trim(
            "{$data['nombre']} {$data['apellido_paterno']} {$data['apellido_materno']}"
        )

        $data['password']=Hash::make('password');

        if(
            isset($data['foto']) &&
            $data['foto'] instanceof UploadedFile
        ){
            $data['foto']=$data['foto']->store('users','public');
        }
        return User::create($data);
    }
}
