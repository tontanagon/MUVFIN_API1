<?php

namespace App\Http\Controllers;

use App\Models\filmtext;
use Illuminate\Http\Request;

class FilmtextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmtext = filmtext::all();

        return response()->json([
            'Data' => $filmtext
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'required|integer',
            'description' => 'required|string|max:10000',
        ]);

        filmtext::create($validated);

        return response()->json(['message' => 'fi created successfully'], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\filmtext  $filmtext
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,filmtext $filmtext)
    {
        $filmtext = filmtext::find($request->filmtext);

        if(!$filmtext){
            return response()->json([
                'message' => 'filmtext not found',
            ], 404);
        }

        return response()->json([
            'message' => 'filmtext get successfully',
            'Data' => $filmtext
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\filmtext  $filmtext
     * @return \Illuminate\Http\Response
     */
    public function edit(filmtext $filmtext)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\filmtext  $filmtext
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, filmtext $filmtext)
    {
        $validated = $request->validate([
            'film_id' => 'required|integer',
            'description' => 'required|string|max:10000',
        ]);

        if (!$filmtext) {
            return response()->json(['message' => 'filmtext not found'], 404);
        }
            $filmtext->update($validated);

            return response()->json(['message' => 'filmtext update successfully', 'data' => $filmtext], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\filmtext  $filmtext
     * @return \Illuminate\Http\Response
     */
    public function destroy($filmtext)
    {
        $filmtext = filmtext::find($filmtext);
        if ($filmtext) {
        $filmtext->delete();
        return response()->json(['message' => 'filmtext deleted successfully',
    'data' =>$filmtext], 200);
        } else{
            return response()->json(['message' => 'filmtext not found'], 404);
        }

    }
}

