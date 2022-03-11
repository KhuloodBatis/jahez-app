<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => (['integer', 'required']),
            'restaurant_id' => (['integer', 'required']),
            'price' => (['integer', 'required']),

            'meal_ids' => (['required']),

        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'restaurant_id' => $request->restaurant_id,
            'price' => $request->price,
            'meal_id' => $request->meal_ids,

        ]);

        $order->meals()->attach($request->meal_ids);
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        return $order->load('user', 'restaurant', 'meals');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => (['integer', 'required']),
            'restaurant_id' => (['integer', 'required']),
            'price' => (['integer', 'required']),
            'meal_id' => (['integer', 'required']),

        ]);

        $order->update([
            'user_id' => $request->user_id,
            'restaurant_id' => $request->user_id,
            'price' => $request->user_id,
            'meal_id' => [$request->meal_id],
        ]);
        //to allow the user update meals
        return $order->meal()->sync($request->meal_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return 'order was deleted';
    }
}
