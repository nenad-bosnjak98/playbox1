<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller

{
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        if(auth()->user()->id == null) {
            return redirect('/posts')->with('error', 'You need to be logged in to comment!');
        }
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return redirect('/posts')->with('success', 'Comment Created');
    }
}
