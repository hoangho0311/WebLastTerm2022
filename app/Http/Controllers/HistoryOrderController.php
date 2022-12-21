<?php

namespace App\Http\Controllers;

use App\Models\HistoryOrders;
use Illuminate\Support\Facades\Auth;
use App\Models\cars;
use Illuminate\Http\Request;

class HistoryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $history = HistoryOrders::where('iduser',Auth::user()->id)->get();
            return view('History')->with('history',$history);
        }
        return view('login/login');
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
    public function store(Request $request, $id)
    {
        $HistoryOrders = new HistoryOrders();
        $HistoryOrders->iduser = Auth::user()->id;
        $car = cars::find($id);
        $HistoryOrders->idproduct=$car->id;
        $HistoryOrders->Amount=$car->price;
        $HistoryOrders->OrderStatus= "running" ;
        $HistoryOrders->save();

        return redirect()->route('dashboard');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryOrders  $historyOrders
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryOrders $historyOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryOrders  $historyOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryOrders $historyOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryOrders  $historyOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryOrders $historyOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryOrders  $historyOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryOrders $historyOrders)
    {
        //
    }
}
