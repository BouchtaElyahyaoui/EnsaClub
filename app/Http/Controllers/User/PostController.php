<?php

namespace App\Http\Controllers\User;

use App\Events\SomeonePostedEvent;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
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
     * @param  \Illuminate\Http\Requests\PostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {


        $data = $request->only(['body', 'user_id', 'parent_id', 'post_images', 'user_club']);

        if ((auth()->user()->id != $data['user_id']) && (!auth()->user()->is_friends_with($request->user_id))) {
            return back()->withErrors(['message' => 'You must be friends first!']);
        }
        if ((auth()->user()->id != $data['user_id']) && (auth()->user()->is_friends_with($data['user_id']))) {

            if ($request->user_club) {
                $post = Post::create([
                    'body' => $data['body'],
                    'parent_id' => $data['user_id'],
                    'user_id' => auth()->user()->id,
                    'club_id' => $request->user_club['club_id'],
                ]);
            } else {
                $post = Post::create([
                    'body' => $data['body'],
                    'parent_id' => $data['user_id'],
                    'user_id' => auth()->user()->id,
                ]);
            }


            foreach (auth()->user()->friends() as $friend) {
                event(new SomeonePostedEvent($friend, auth()->user()));
            }

            $image_path = '';
            if ($request->hasFile('post_images')) {
                $image_path = $request->file('post_images')->store('post_images', 'public');
            }
            PostImages::create([
                'url' => $image_path,
                'post_id' => $post->id,
            ]);

            // $user->notify(new SomeonePosted($user, auth()->user()));
            return back();
        }
        if ((auth()->user()->id = $data['user_id'])) {
            if ($request->user_club) {
                $post =  auth()->user()->posts()->create([
                    'body' => $data['body'],
                    'club_id' => $request->user_club['club_id'],
                ]);
            } else {
                $post =  auth()->user()->posts()->create([
                    'body' => $data['body'],
                ]);
            }

            foreach (auth()->user()->friends() as $friend) {
                event(new SomeonePostedEvent($friend, auth()->user()));
            }
            $image_path = '';
            if ($request->hasFile('post_images')) {
                foreach ($request->file('post_images') as $imagefile) {
                    $image_path = $imagefile->store('post_images', 'public');
                    $image = PostImages::create([
                        'url' => $image_path,
                        'post_id' => $post->id,
                    ]);
                }
            }

            // $user->notify(new SomeonePosted($user, auth()->user()));
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ((auth()->user()->id != $post->user_id) && (!auth()->user()->is_friends_with($post->user_id))) {
            return back()->withErrors(['message' => 'You do not have permission to delete this post !']);
        }

        if ((auth()->user()->id != $post->user_id) && (auth()->user()->id != $post->parent_id)) {
            return back()->withErrors(['message' => 'You do not have permission to delete this post !']);
        }
        if ((auth()->user()->id != $post->user_id) && (auth()->user()->id = $post->parent_id)) {
            $post->delete();
            return back();
        }
        if (auth()->user()->id = $post->user_id) {
            $post->delete();
            return back();
        }
    }
}
