<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\Models\Room;
use Inertia\Inertia;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\NewChatMessageEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {
        $messages = Message::where('room_id', $room->id)
            ->with('user')
            ->oldest()
            ->get();
        // $clubs = DB::table('user_clubs')
        //     ->join('clubs', 'user_clubs.club_id', '=', 'clubs.id')
        //     ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '>=', 1], ['user_clubs.role_id', '<=', 9]])
        //     ->get();

        $clubs = Club::join('user_clubs', 'clubs.id', 'user_clubs.club_id')
            ->where([['user_clubs.user_id', '=', auth()->user()->id], ['user_clubs.role_id', '>=', 1], ['user_clubs.role_id', '<=', 9]])
            ->get();


        // foreach ($clubs as $club) {
        //     $user_clubs = $club->users()->get();
        //     dd($user_clubs);
        // }

        return Inertia::render('User/ChatRooms/Index', [
            'rooms' => Room::all(),
            'messages' => $messages,
            'currentRoom' => $room,
            'clubs' => $clubs,
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
     *@param  \App\Models\Room  $room
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Room $room)
    {
        $message = $room->messages()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        broadcast(new NewChatMessageEvent($message, auth()->user()))->toOthers();
        return back();
    }


    /**
     * Store a newly created resource in storage.
     *@param  \App\Models\Room  $room
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRoom(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => ['required'],
        ]);
        $room = Room::create([
            'name' => $validated['name'],
            'slug' => Str::of($validated['name'])->slug('-'),
        ]);
        foreach ($request['user_id'] as $id) {
            $room->users()->attach($id, ['club_id' => $request->club['id']]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        $user_clubs = $club->users()->get();
        return back()->with($user_clubs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
