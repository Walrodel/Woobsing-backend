<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Usuario extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'Nombre'=>$this->Nombre,
            'Apellido'=>$this->Apellido,
            'Telefono'=>$this->Telefono,
            'Mail'=>$this->Mail,
            'Direccion'=>$this->Direccion,
    ];
    }
}