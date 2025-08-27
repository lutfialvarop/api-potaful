<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantTask extends Model
{
    protected $fillable = [
        'plant_package_id',
        'task_type',
        'day',
        'title',
        'description',
        'philosophy',
    ];
}
