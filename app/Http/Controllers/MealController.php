<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Meal::all();
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
        // Store meal to database
        $meal = Meal::create($request->all());

        // Check if there is an image in the request
        if ($request->hasFile('image')) {

            $originalImage = $request->file('image');
            
            // Resize the image
            $resizedImage = Image::make($originalImage);
            $resizedImage->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = public_path('images/meal/' . $meal->id);
            //$resizedImage->save($path);
            $resizedImage->stream();

            Storage::disk('local')->put('public/images/meal/' . $meal->id, $resizedImage, 'public');
            //$path = $originalImage->storeAs(public_path().'/images/meal/', $meal->id);
        }
        return response($meal, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
