<?php

namespace App\Models;

use Database\Factories\ClientFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'logo_letter', 'color_class', 'sort_order', 'logo'])]
class Client extends Model
{
    /** @use HasFactory<ClientFactory> */
    use HasFactory;
}
