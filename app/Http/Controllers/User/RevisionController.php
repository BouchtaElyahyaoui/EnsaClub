<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Events\ClubRequestAcceptedEvent;
use App\Notifications\ClubRequestAccepted;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clubs = DB::table('user_clubs')
            ->join('clubs', 'user_clubs.club_id', '=', 'clubs.id')
            ->join('users', 'user_clubs.user_id', '=', 'users.id')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '=', 4]])
            ->get();
        $revisions = Revision::join('clubs', 'revisions.club_id', '=', 'clubs.id')
            ->join('user_clubs', 'clubs.id', '=', 'user_clubs.club_id')
            ->join('users', 'revisions.user_id', '=', 'users.id')
            ->select('revisions.*', 'clubs.clubName')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '=', 4]])
            ->when($request->input('search'), function ($query, $search) {
                $query->where('users.username', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('clubs.clubName')
            ->paginate(5)
            ->withQueryString();

        $revisions_pending = Revision::join('clubs', 'revisions.club_id', '=', 'clubs.id')
            ->join('user_clubs', 'clubs.id', '=', 'user_clubs.club_id')
            ->join('users', 'revisions.user_id', '=', 'users.id')
            ->select('revisions.*', 'clubs.clubName')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '=', 4], ['revisions.status', 0]])
            ->when($request->input('search'), function ($query, $search) {
                $query->where('users.username', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('clubs.clubName')
            ->paginate(5)
            ->withQueryString();

        $revisions_accepted = Revision::join('clubs', 'revisions.club_id', '=', 'clubs.id')
            ->join('user_clubs', 'clubs.id', '=', 'user_clubs.club_id')
            ->join('users', 'revisions.user_id', '=', 'users.id')
            ->select('revisions.*', 'clubs.clubName')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '=', 4], ['revisions.status', 1]])
            ->when($request->input('search'), function ($query, $search) {
                $query->where('users.username', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('clubs.clubName')
            ->paginate(5)
            ->withQueryString();


        return Inertia::render('Revision/Show', [
            'clubs' => $clubs,
            'revisions' => $revisions,
            'revisions_pending' => $revisions_pending,
            'revisions_accepted' => $revisions_accepted,
            'filters' => $request->only(['search']),


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
        return redirect()->back();
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
        $user = User::find($revision->user_id);
        $club->users()->attach($revision->user_id, ['role_id' => 0]);


        if ($user->id != auth()->user()->id) {
            event(new ClubRequestAcceptedEvent($user, $club));
        }



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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRev($id)
    {
        Revision::find($id)->delete();
        return back();
    }
}
