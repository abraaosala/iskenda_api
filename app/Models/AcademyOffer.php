<?php

namespace App\Models;

use Database\Factories\AcademyOfferFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'icon', 'sort_order', 'is_visible'])]
class AcademyOffer extends Model
{
    /** @use HasFactory<AcademyOfferFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }
}
