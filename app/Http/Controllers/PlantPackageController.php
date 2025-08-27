<?php

namespace App\Http\Controllers;

use App\Models\PlantPackage;
use Illuminate\Http\Request;

class PlantPackageController extends Controller
{
    public function index()
    {
        $plantPackages = PlantPackage::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Packages retrieved successfully',
            'data' => $plantPackages
        ], 200);
    }

    public function show($id)
    {
        $plantPackage = PlantPackage::find($id);

        if (!$plantPackage) {
            return response()->json([
                'status' => 'error',
                'message' => 'Plant Package not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Package retrieved successfully',
            'data' => $plantPackage
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'days_to_harvest' => 'required|integer',
            'image_url' => 'required|url',
        ]);

        if ($validate == false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid data'
            ], 400);
        }

        $plantPackage = PlantPackage::create([
            'title' => $request->title,
            'days_to_harvest' => $request->days_to_harvest,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Package created successfully',
            'data' => $plantPackage
        ], 201);
    }
}
