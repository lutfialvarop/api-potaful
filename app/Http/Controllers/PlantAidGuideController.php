<?php

namespace App\Http\Controllers;

use App\Models\PlantAidGuide;
use Illuminate\Http\Request;

class PlantAidGuideController extends Controller
{
    public function index()
    {
        $plantAidGuides = PlantAidGuide::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Aid Guides retrieved successfully',
            'data' => $plantAidGuides
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'posible_cause' => 'required|string',
        ]);

        if ($validate == false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid data'
            ], 400);
        }

        $plantAidGuide = PlantAidGuide::create([
            'title' => $request->title,
            'posible_cause' => $request->posible_cause,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Plant Aid Guide created successfully',
            'data' => $plantAidGuide
        ], 201);
    }
}
