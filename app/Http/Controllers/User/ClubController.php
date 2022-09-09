<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserClub;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::latest()->paginate(30);
        return Inertia::render('Club/Index', [
            'clubs' => $clubs,
        ]);
    }

    public function firstStep(Request $request)
    {
        $request->validate([
            'clubName' => ['required'],
            'description' => ['required'],
            'mission' => ['required'],
            'dateOfCreation' => ['required'],
        ]);
        return to_route('clubs.create');
    }

    public function secondStep(Request $request)
    {
        $request->validate([
            'president' => ['required'],
            'vicePresident' => ['required'],
            'secretaire' => ['required'],
            'tresorier' => ['required'],
            'responsbaleSponsoring' => ['required'],
            'responsableDesign' => ['required'],
            'responsableCommunication' => ['required'],
            'responsableFormationMateriel' => ['required'],
            'respensableMediatisation' => ['required'],
        ]);
        return to_route('clubs.create');
    }

    // public function secondStep(Request $request)
    // {
    //     $request->validate([
    //         'ClubImage' => ['required'],
    //     ]);
    //     return to_route('products.create');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Club/Create', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::of($request->clubName)->slug('-');
        $validated = $request->validate([
            'clubName' => ['required'],
            'description' => ['required'],
            'mission' => ['required'],
            'dateOfCreation' => ['required'],
            'president' => ['required'],
            'vicePresident' => ['required'],
            'secretaire' => ['required'],
            'tresorier' => ['required'],
            'responsbaleSponsoring' => ['required'],
            'responsableDesign' => ['required'],
            'responsableCommunication' => ['required'],
            'responsableFormationMateriel' => ['required'],
            'respensableMediatisation' => ['required'],
        ]);


        $image_path = '';
        if ($request->hasFile('ClubImage')) {
            $image_path = $request->file('ClubImage')->store('club_images', 'public');
        }

        $club = Club::create([
            'clubName' => $validated['clubName'],
            'description' => $validated['description'],
            'mission' => $validated['mission'],
            'dateOfCreation' => $validated['dateOfCreation'],
            'slug' => $slug,
            'ClubImage' => $image_path,
        ]);

        $club->users()->attach($request->president['id'], ['role_id' => 1]);
        $club->users()->attach($request->vicePresident['id'], ['role_id' => 2]);
        $club->users()->attach($request->secretaire['id'], ['role_id' => 3]);
        $club->users()->attach($request->tresorier['id'], ['role_id' => 4]);
        $club->users()->attach($request->responsbaleSponsoring['id'], ['role_id' => 5]);
        $club->users()->attach($request->responsableDesign['id'], ['role_id' => 6]);
        $club->users()->attach($request->responsableCommunication['id'], ['role_id' => 7]);
        $club->users()->attach($request->responsableFormationMateriel['id'], ['role_id' => 8]);
        $club->users()->attach($request->respensableMediatisation['id'], ['role_id' => 9]);

        return to_route('clubs.create');
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
