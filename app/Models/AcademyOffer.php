<?php

namespace App\Models;

use Database\Factories\AcademyOfferFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'icon', 'sort_order'])]
class AcademyOffer extends Model
{
    /** @use HasFactory<AcademyOfferFactory> */
    use HasFactory;
}
