<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PolaObatResource extends JsonResource
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
            'obat' => $this->obat,
            'jumlah' => $this->jumlah,
            'anjuran' => $this->anjuran,
            'pemeriksaan' => new PemeriksaanResource($this->whenLoaded('pemeriksaan')),
            'jadwal' => new JadwalCheckupResource($this->whenLoaded('jadwal_checkup')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
