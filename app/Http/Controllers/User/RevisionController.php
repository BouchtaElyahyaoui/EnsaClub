<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = DB::table('user_clubs')
            ->join('clubs', 'user_clubs.club_id', '=', 'clubs.id')
            ->join('users', 'user_clubs.user_id', '=', 'users.id')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '=', 3]])
            ->get();
        $revisions = DB::table('revisions')
            ->join('clubs', 'revisions.club_id', '=', 'clubs.id')
            ->join('user_clubs', 'clubs.id', '=', 'user_clubs.club_id')
            ->join('users', 'revisions.user_id', '=', 'users.id')
            ->select('revisions.*', 'users.username')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '=', 3], ['revisions.status', '=', 0]])
            ->get();

        return Inertia::render('Revision/Show', [
            'clubs' => $clubs,
            'revisions' => $revisions,
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
        $validated =  $request->validate([
            'text' => ['required'],
            'club_id' => ['required']
        ]);

        Revision::create([
            'user_id' => auth()->user()->id,
            'club_id' => $validated['club_id'],
            'text' => $validated['text'],
        ]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $revision  = Revision::find($id);
        $revision->status = 1;
        $revision->save();

        $club = Club::find($revision->club_id);
        $club->users()->attach($revision->user_id, ['role_id' => 0]);

        return back();
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
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        Revision::where([['status', 0], ['user_id', '=', auth()->user()->id], ['club_id', '=', $club->id]])->delete();
        return back();
    }
}
