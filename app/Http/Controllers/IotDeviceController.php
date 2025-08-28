<?php

namespace App\Http\Controllers;

use App\Models\IotDevice;
use Illuminate\Http\Request;

class IotDeviceController extends Controller
{
    public function show($id)
    {
        $iotDevice = IotDevice::where('iot_device_id', $id)->get();

        if ($iotDevice->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'IoT Device not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'IoT Device retrieved successfully',
            'data' => $iotDevice
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'device_id' => 'required|string|unique:iot_devices,device_id',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        if ($validate == false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid data'
            ], 400);
        }

        $iotDevice = IotDevice::create([
            'device_id' => $request->device_id,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'IoT Device created successfully',
            'data' => $iotDevice
        ], 201);
    }

    public function check($id)
    {
        $iotDevice = IotDevice::where('device_id', $id)->first();

        if ($iotDevice) {
            return response()->json([
                'status' => 'success',
                'message' => 'IoT Device exists',
                'data' => $iotDevice
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'IoT Device does not exist'
            ], 404);
        }
    }
}
