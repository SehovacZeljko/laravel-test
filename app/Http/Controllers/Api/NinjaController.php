<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ninja;
use App\Models\Dojo;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    /**
     * Display a listing of ninjas
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $ninjas = Ninja::with('dojo')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($ninjas, 200);
    }

    /**
     * Display the specified ninja
     * 
     * @param Ninja $ninja
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Ninja $ninja)
    {
        $ninja->load('dojo');

        return response()->json([
            'ninja' => $ninja,
        ], 200);
    }

    /**
     * Store a newly created ninja
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id',
        ]);

        $ninja = Ninja::create($validated);
        
        // Load the dojo relationship for the response
        $ninja->load('dojo');

        return response()->json([
            'message' => 'Ninja created successfully',
            'ninja' => $ninja,
        ], 201);
    }

    /**
     * Update the specified ninja
     * 
     * @param Request $request
     * @param Ninja $ninja
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Ninja $ninja)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'skill' => 'sometimes|required|integer|min:0|max:100',
            'bio' => 'sometimes|required|string|min:20|max:1000',
            'dojo_id' => 'sometimes|required|exists:dojos,id',
        ]);

        $ninja->update($validated);
        
        // Load the dojo relationship for the response
        $ninja->load('dojo');

        return response()->json([
            'message' => 'Ninja updated successfully',
            'ninja' => $ninja,
        ], 200);
    }

    /**
     * Remove the specified ninja
     * 
     * @param Ninja $ninja
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Ninja $ninja)
    {
        $name = $ninja->name;
        
        $ninja->delete();

        return response()->json([
            'message' => "Ninja {$name} deleted successfully",
        ], 200);
    }
}