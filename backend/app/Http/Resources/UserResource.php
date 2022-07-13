<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'pemeriksaan_dokters' => PemeriksaanResource::collection($this->whenLoaded('pemeriksaan_dokters')),
            'pemeriksaan_pasiens' => PemeriksaanResource::collection($this->whenLoaded('pemeriksaan_pasiens')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
