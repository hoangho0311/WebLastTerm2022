<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Replycomments;
use App\Models\Infors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comments::paginate(10);
        $infor = Infors::all();
        $user = User::all();
        $Replycomments = Replycomments::all();
        return view("admin/managerComment")->with('comments', $comments)->with('user', $user)->with('infor', $infor)->with('Replycomments', $Replycomments);
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
        $comment = new comments;
        $comment->iduser=Auth::user()->id;
        $comment->content = $request->content;
        $comment->save();
        $comment = DB::table('comments')->where('iduser', Auth::user()->id)->get();
        return redirect()->route('commentpage', compact("comment"));
    }

    public function updateStatus($id){
        $comments = comments::find($id);
        if($comments->visible == "true"){
            $comments->visible = "false";
            $comments->save();
        }else{
            $comments->visible = "true";
            $comments->save();
        }
        
        return redirect()->route('managerComment');
    }

    public function update(Request $request, $id){
        $comments = comments::find($id);
        $input = $request->all();
        $comments->fill($input)->save();
 
        return redirect()->route('managerComment');
    }
 
    public function delete($id)
    {
        $comments = comments::find($id);
        $comments->delete();
  
        return redirect()->route('managerComment');
    }
}
