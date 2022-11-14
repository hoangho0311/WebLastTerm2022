<?php

namespace App\Http\Controllers;

use App\Models\Replycomments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReplycommentController extends Controller
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
    public function store(Request $request, $id)
    {
        $comment = new Replycomments;
        $comment->idcomment = $id;
        $comment->iduser= Auth::user()->id;
        $comment->content = $request->replycontent;
        $comment->save();
        return redirect()->route('commentpage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Replycomments  $replycomments
     * @return \Illuminate\Http\Response
     */
    public function show(Replycomments $replycomments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Replycomments  $replycomments
     * @return \Illuminate\Http\Response
     */
    public function edit(Replycomments $replycomments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Replycomments  $replycomments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replycomments $replycomments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replycomments  $replycomments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replycomments $replycomments)
    {
        //
    }
}
