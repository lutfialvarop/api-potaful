<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IotSensor extends Model
{
    protected $fillable = [
        'sensor_id',
        'iot_device_id',
        'value',
    ];
}
