<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoundRequest;
use App\Models\Sound;
use App\Services\SoundServices;
use Illuminate\Http\Request;

class SoundsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sounds = Sound::sortedSounds()->get();
        $enabledSounds = Sound::enabledSounds()->sortedSounds()->get();

        $data = [
            'sounds'        => $sounds,
            'enabledSounds' => $enabledSounds,
        ];

        return view('pages.sounds.index', $data);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sound = SoundServices::getSound($id);

        return view('pages.sounds.show', ['sound' => $sound]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sound = SoundServices::getSound($id);

        return view('pages.sounds.edit', ['sound' => $sound]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SoundRequest $request, $id)
    {
        $validated  = $request->validated();
        $sound      = SoundServices::getSound($id);

        // dd($validated);
// $file = $request->file('image');

// dd($validated);



$sound->fill($validated);
$sound->save();

// dd($validated);

return view('pages.sounds.edit', ['sound' => $sound])->with('success', 'Sound updated: <strong>'.$sound->title.'</strong>');
        // dd($sound);

        // dd('saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sound = SoundServices::getSound($id);
        $sound->delete();

        return redirect('sounds')->with('success', 'Sound deleted <strong>'.$sound->title.'</strong>');
    }
}
