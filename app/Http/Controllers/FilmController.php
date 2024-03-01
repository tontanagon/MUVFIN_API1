<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\film;
use App\Models\customer;
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

    public function index(Request $request )
     {
        $film = film::all();

        return $film;
     }

    public function home(Request $request , $page =1)
    {
        $cate = category::all();
        $countfilm = film::count();


        if(is_numeric($page) && $page >= 1) {
            $last =  8 * $page;
            $first = $last - 7;

            $films = DB::table('films')
                ->leftJoin('filmtexts','films.film_id','=','filmtexts.film_id')
                ->leftJoin('categories','films.category_id','=','categories.category_id')
                ->select('films.*', 'filmtexts.*', 'categories.*')
                ->whereBetween('films.film_id', [$first, $last])
                ->get();
        } else{
            $films = DB::table('films')
                ->leftJoin('filmtexts','films.film_id','=','filmtexts.film_id')
                ->leftJoin('categories','films.category_id','=','categories.category_id')
                ->select('films.*', 'filmtexts.*', 'categories.*')
                ->where('categories.name','=',$page)
                ->get();
        }

        return Inertia::render('Home',[
            'films' => $films,
            'cate' => $cate,
            'countfilm' => $countfilm,
            'prenext' => $page,
        ]);
    }

    public function welcome(Request $request)
    {
        // Your code to fetch film data based on the request, if needed
        $films = DB::table('films')
            ->leftJoin('filmtexts', 'films.film_id', '=', 'filmtexts.film_id')
            ->leftJoin('categories', 'films.category_id', '=', 'categories.category_id')
            ->select('films.*', 'filmtexts.*', 'categories.*')
            ->orderBy('rating' , 'DESC')
            ->limit(3)
            ->get();

            return $films ;
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
            'title' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'length' => 'required|integer',
            'rating' => 'required|string|max:15',
            'actor' => 'required|string|max:255',
            'imgUrl' => 'required|string|max:255',
        ]);

        film::create($validated);

        return response()->json(['message' => 'films created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function show($film_id)
    {
        $film = film::find($film_id);

        if(!$film){
            return response()->json([
                'message' => 'film not found',
            ], 404);
        }

        return response()->json([
            'message' => 'film get successfully',
            'Data' => $film
        ], 201);
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
        $validated = $request->validate([
            'film_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'length' => 'required|integer',
            'rating' => 'required|string|max:15',
            'actor' => 'required|string|max:255',
            'imgUrl' => 'required|string|max:255',
        ]);

        $film = film::find($request->film_id);

        if (!$film) {
            return response()->json(['message' => 'film not found'], 404);
        }
            $film->update($validated);

            return response()->json(['message' => 'film update successfully', 'data' => $film], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($film_id)
    {
        $film = Film::find($film_id);

        if($film){
            $film->delete();
            return response()->json(['message' => 'film deleted successfully' , 'data' => $film], 200);
        } else {
            return response()->json(['message' => 'film not found'], 404);
        }
    }
}
