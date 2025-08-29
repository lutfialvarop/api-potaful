<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecificNeed extends Model
{
    protected $fillable = [
        'plant_package_id',
        'name',
    ];
}
