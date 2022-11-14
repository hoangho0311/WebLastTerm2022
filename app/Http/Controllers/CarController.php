<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = cars::latest()->paginate(5);
        $carts = DB::table('carts')->where('iduser', Auth::user()->id)->get();
        $user = Auth::user();
        if(DB::table('carts')->where('iduser', Auth::user()->id)->get()==null){
            return view('sellcar', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5)->with('user', $user);
        }else{
            return view('sellcar', compact('data'), ["carts" => $carts])->with('user', $user)->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action/insertProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
    
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('image/cars'), $file_name);

        $car = new cars;

        $car->name = $request->name;
        $car->fuel = $request->fuel;
        $car->power = $request->power;
        $car->price = $request->price;
        $car->type = $request->type;
        $car->color = $request->color;
        $car->image = $file_name;

        $car->save();
        return redirect()->route('sellcar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = cars::find($id);
        $car->delete();
        $data = cars::all();
        return redirect()->route('managerProduct')->with('product',$data);
    }

    public function managerProduct(){
        $data = cars::all();
        return view('admin/managerProduct')->with('product',$data);
    }
}
