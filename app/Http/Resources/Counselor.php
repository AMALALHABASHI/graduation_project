<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Counselor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'counselor_image'=> $this->user_image,
            'counselor_name'=>$this->name,
            'email'=>$this->email,
        ];
    }
}
