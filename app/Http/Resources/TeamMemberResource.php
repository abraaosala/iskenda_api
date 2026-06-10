<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
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
            'role' => $this->role,
            'description' => $this->description,
            'initials' => $this->initials,
            'colorClass' => $this->color_class,
            'gradient' => $this->gradient,
            'icon' => $this->icon,
            'photo' => $this->photo ? asset('storage/'.$this->photo) : null,
            'sortOrder' => $this->sort_order,
        ];
    }
}
