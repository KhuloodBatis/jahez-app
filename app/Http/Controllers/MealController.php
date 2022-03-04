<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => (['string', 'required']),
            'price' => (['integer', 'required']),
            'restaurant_id' => (['integer', 'required']),

        ]);

        $meal = Meal::create([
            'name' => $request->name,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id,
        ]);
        return $meal;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return $meal;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name' => (['string', 'required']),
            'price' => (['integer', 'required']),

        ]);
        $meal->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return $meal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
    }
}
