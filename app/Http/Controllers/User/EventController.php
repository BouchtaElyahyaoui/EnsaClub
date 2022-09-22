<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Club;
use Inertia\Inertia;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = array();
        $evenements = Event::all();
        $clubs = DB::table('user_clubs')
            ->join('clubs', 'user_clubs.club_id', '=', 'clubs.id')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '>=', 1], ['user_clubs.role_id', '<=', 9]])
            ->get();

        foreach ($evenements as $evenement) {
            $events[] = [
                'title' => $evenement->title,
                'description' => $evenement->description,
                'start' => $evenement->start,
                'end' => $evenement->end,
                'club_id' => $evenement->club_id,
            ];
        }
        return Inertia::render('Event/Index', [
            'events' => $events,
            'clubs' => $clubs,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        return Event::all();
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
        $event = new Event([
            'start' => $request->start,
            'end' => $request->end,
            'title' => $request->title,
            'description' => $request->description,
            'club_id' => 1,
        ]);
        $event->save();
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
    public function update(Request $request, Event $event)
    {
        $event->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return back();
    }
}
