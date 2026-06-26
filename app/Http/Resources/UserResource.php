<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'nombre_completo' => trim(
                "{$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}"
            ),
            'email' => $this->email,
            'telefono' => $this->telefono,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero' => [
                'value'=>$this->genero?->value,
                'label'=>$this->genero?->label(),
            ],
            'foto' => $this->foto
                ?:asset("storage/{$this->foto")
                :null, 
            'created_at'=>$this->created_at?->format ('d/m/Y'),
        ];
    }
}
