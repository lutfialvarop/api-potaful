<?php

namespace App\Http\Controllers;

use App\Models\PlantTask;
use Illuminate\Http\Request;

class PlantTaskController extends Controller
{
    public function show($id)
    {
        $plantTask = PlantTask::where('plant_package_id', $id)->get();

        if ($plantTask->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plant Task not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Task retrieved successfully',
            'data' => $plantTask
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'plant_package_id' => 'required|exists:plant_packages,id',
            'task_type' => 'required|string',
            'day' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'philosophy' => 'required|string',
        ]);

        if ($validate == false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid data'
            ], 400);
        }

        $plantTask = PlantTask::create([
            'plant_package_id' => $request->plant_package_id,
            'task_type' => $request->task_type,
            'day' => $request->day,
            'title' => $request->title,
            'description' => $request->description,
            'philosophy' => $request->philosophy,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Task created successfully',
            'data' => $plantTask
        ], 201);
    }
}
