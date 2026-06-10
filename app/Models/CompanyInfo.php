<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table = 'company_info';

    protected $fillable = [
        'name', 'full_name', 'slogan', 'founded_year',
        'years_experience', 'active_clients_count', 'phone',
        'email', 'working_hours', 'address', 'copyright',
        'logo', 'favicon', 'hero_image',
    ];
}
