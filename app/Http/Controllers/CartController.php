<?php

namespace App\Http\Controllers;
use App\Models\cars;
use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function form_submit(Request $request, $id){
        $cart = new carts();
        $cart->iduser = Auth::user()->id;
        $car = cars::find($id);
        $cart->idcar=$car->id;
        $cart->name_product=$car->name;
        $cart->price_product=$car->price;
        $cart->product_image=$car->image;
        $cart->save();

        return redirect()->route('sellcar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $car = carts::find($id);
        $car->delete();

        return redirect()->route('sellcar');
    }

    public function delete(carts $carts){
        $carts->delete();

        return redirect()->route('sellcar');
    }
}
