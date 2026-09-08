<?php

namespace App\Models;

use Database\Factories\CompanyValueFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'icon', 'sort_order', 'is_visible'])]
class CompanyValue extends Model
{
    /** @use HasFactory<CompanyValueFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }
}
