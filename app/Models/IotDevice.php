<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IotDevice extends Model
{
    protected $fillable = [
        'device_id',
        'temperature',
        'humidity'
    ];
}
