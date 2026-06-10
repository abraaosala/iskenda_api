<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name' => $this->name,
            'logoLetter' => $this->logo_letter,
            'colorClass' => $this->color_class,
            'logo' => $this->logo ? asset('storage/'.$this->logo) : null,
            'sortOrder' => $this->sort_order,
        ];
    }
}
