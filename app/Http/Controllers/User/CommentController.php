<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;

class CommentController extends Controller
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
     * @param  \Illuminate\Http\Requests\CommentFormRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(CommentFormRequest $request, Post $post)
    {
        if ((auth()->user()->id != $request->user_id) && (!auth()->user()->is_friends_with($request->user_id))) {
            return back();
        }
        if ((auth()->user()->id != $request->user_id) && (auth()->user()->is_friends_with($request->user_id))) {
            auth()->user()->comments()->create([
                'body' => $request->body,
                'post_id' => $post->id,
            ]);
            return back();
        }
        if ((auth()->user()->id = $request->user_id)) {
            auth()->user()->comments()->create([
                'body' => $request->body,
                'post_id' => $post->id,
            ]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ((auth()->user()->id != $comment->user_id) && (!auth()->user()->is_friends_with($comment->user_id))) {
            return back()->withErrors(['message' => 'You do not have permission to delete this comment !']);
        }

        if (auth()->user()->id != $comment->user_id) {
            return back()->withErrors(['message' => 'You do not have permission to delete this comment !']);
        }
        if (auth()->user()->id = $comment->user_id) {
            $comment->delete();
            return back();
        }
    }
}
