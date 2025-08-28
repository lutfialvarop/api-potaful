<?php

namespace App\Http\Controllers;

use App\Models\IotSensor;
use Illuminate\Http\Request;

class IotSensorController extends Controller
{
    public function show($id)
    {
        $iotSensor = IotSensor::where('device_id', $id)->first();

        if (!$iotSensor) {
            return response()->json([
                'status' => 'error',
                'message' => 'IoT Sensor not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'IoT Sensor retrieved successfully',
            'data' => $iotSensor
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sensor_id' => 'required|string',
            'iot_device_id' => 'required|exists:iot_devices,id',
            'value' => 'required|numeric',
        ]);

        if ($validate == false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid data'
            ], 400);
        }

        $iotSensor = IotSensor::create([
            'sensor_id' => $request->sensor_id,
            'iot_device_id' => $request->iot_device_id,
            'value' => $request->value,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'IoT Sensor created successfully',
            'data' => $iotSensor
        ], 201);
    }
}
