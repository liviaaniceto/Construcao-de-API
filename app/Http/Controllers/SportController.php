<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportModel;
class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = SportModel::all();
        return response()->json($sports);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'category' =>'nullable|string',
        ]);

        $sport = SportModel::create($validatedData);
        return response()->json($sport, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sport = SportModel::find($id);
        if(!$sport){
            return response()->json(["message"=> 'Sport not found'], 404);
        }
        return response()->json($sport);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sport = SportModel::find($id);
        if(!$sport){
            return response()->json(["message"=> 'Sport not found'], 404);
        }
        $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'category' =>'nullable|string',
        ]);

        $sport->update($validatedData);
        return response()->json($sport, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sport = SportModel::find($id);
        if(!$sport){
            return response()->json(['message'=> 'Sport not found'],404);
    }
    $sport->delete();
    return response()->json(['message'=> 'Sport deleted successfully'],200);
}
}