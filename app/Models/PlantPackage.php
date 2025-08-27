<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantPackage extends Model
{
    protected $fillable = [
        'title',
        'days_to_harvest',
        'image_url',
    ];
}
