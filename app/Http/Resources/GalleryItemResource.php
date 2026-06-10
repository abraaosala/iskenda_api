<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryItemResource extends JsonResource
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
            'title' => $this->title,
            'category' => $this->category,
            'gradient' => $this->gradient,
            'icon' => $this->icon,
            'src' => $this->src
                ? (str_starts_with($this->src, 'http') ? $this->src : asset('storage/'.$this->src))
                : null,
            'sortOrder' => $this->sort_order,
        ];
    }
}
