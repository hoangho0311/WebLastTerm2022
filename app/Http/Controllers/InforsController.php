<?php

namespace App\Http\Controllers;

use App\Models\Infors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InforsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function show(Infors $infors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function edit(Infors $infors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        // $request->validate([
        //     'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        // ]);
    
        // $img_file = time() . '.' . request()->image->getClientOriginalExtension();

        // request()->image->move(public_path('image/user_image'), $img_file);
        
        $user = User::where('email',$id)->first();
        $infor = Infors::where('iduser',$id)->first();
        $user->name = $request->name;
        $user->email= $request->email;
        if($request->image == null){
            $user->image= $user->image;
        }else{
            $user->image= $request->image;
        }
        $infor->iduser=$request->email;
        $infor->fname=$request->fname;
        $infor->lname=$request->lname;
        $infor->address=$request->address;
        $infor->city=$request->city;
        $infor->country=$request->country;
        $infor->description=$request->description;
        $user->save();
        $infor->save();

        $user = DB::table('users')->where('email', Auth::user()->email)->first();
        $profile = DB::table('infors')->where('iduser', Auth::user()->email)->first();
        return view('profile', compact("profile"), compact("user"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infors  $infors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infors $infors)
    {
        //
    }
}
