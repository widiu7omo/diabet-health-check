<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemeriksaanResource extends JsonResource
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
            'pemeriksaan' => $this->pemeriksaan,
            'tgl_periksa' => $this->tgl_periksa,
            'hasil_diagnosa' => $this->hasil_diagnosa,
            'dokter' => new UserResource($this->whenLoaded('dokter')),
            'pasien' => new UserResource($this->whenLoaded('pasien')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
