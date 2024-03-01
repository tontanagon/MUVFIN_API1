<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();

        return response()->json([
            'Data' => $category
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
            'category_id' => 'required|integer',
            'name' => 'required|string|max:20',
        ]);

        category::create($validated);

        return response()->json(['message' => 'categories created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,category $category)
    {
        $category = category::find($request->category);

        if(!$category){
            return response()->json([
                'message' => 'Categoy not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Categoy get successfully',
            'Data' => $category
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        $category = category::find($request->category_id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $category->update($validated);

        return response()->json(['message' => 'Category updated successfully', 'data' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Category::find($category_id);

        if($category){
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully', 'data' => $category], 200);
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

 }
