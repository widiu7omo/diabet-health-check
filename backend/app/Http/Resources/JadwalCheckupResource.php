<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JadwalCheckupResource extends JsonResource
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
            'checkup' => $this->checkup,
            'tgl_checkup' => $this->tgl_checkup,
            'lokasi' => $this->lokasi,
            'catatan' => $this->catatan,
            'status' => $this->status,
            'pemeriksaan' => new PemeriksaanResource($this->whenLoaded('pemeriksaan')),
            'dokter' => new UserResource($this->whenLoaded('dokter')),
            'pasien' => new UserResource($this->whenLoaded('pasien')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
