<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $combinedPosts = Post::allPosts()->latest()
            ->when($request->input('input'), function ($query, $input) {
                $query->where('body', 'LIKE', '%' . $input . '%');
            })->paginate(5)
            ->withQueryString();
        $user_clubs = DB::table('user_clubs')
            ->join('clubs', 'user_clubs.club_id', '=', 'clubs.id')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '>=', 1], ['user_clubs.role_id', '<=', 9]])
            ->get();

        if ($request->wantsJson()) {
            return $combinedPosts;
        }
        return Inertia::render('Dashboard', [
            'combinedPosts' => $combinedPosts,
            'filters' => $request->only(['input']),
            'user_clubs' => $user_clubs,
            'suggestions' => User::suggestions()->take(5)->inRandomOrder()->get(),
            'suggestion_clubs' => Club::take(2)->inRandomOrder()->get(),
        ]);
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
    public function destroy($id)
    {
        //
    }
}
