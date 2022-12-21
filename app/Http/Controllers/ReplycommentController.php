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

    public function updateStatus($id){
        $replycomment = Replycomments::find($id);
        if($replycomment->visible == "true"){
            $replycomment->visible = "false";
            $replycomment->save();
        }else{
            $replycomment->visible = "true";
            $replycomment->save();
        }
        
        return redirect()->route('managerComment');
    }

}
