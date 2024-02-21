<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\film;
use App\Models\filmtext;
use App\Models\category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = DB::table('films')
        ->leftJoin('film_texts','films.film_id','=','film_texts.film_id')
        ->leftJoin('categories','films.category_id','=','categories.category_id')
        ->get();

        $cate = category::all();

        return Inertia::render('Home',[
            'films' => $films,
            'cate' => $cate,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(film $film)
    {
        //
    }
}