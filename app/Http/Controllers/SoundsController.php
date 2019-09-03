<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoundRequest;
use App\Services\SoundServices;
use Illuminate\Http\Request;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class SoundsController extends Controller
{
    use ActivityLogger;

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
        $sounds = SoundServices::getSortedSounds();
        $enabledSounds = SoundServices::getEnabledSortedSounds();

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
        $sound = SoundServices::getBlankSound();

        return view('pages.sounds.create', ['sound' => $sound]);
    }

public function createRecording()
{
    return view('pages.sounds.record-sound');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SoundRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SoundRequest $request)
    {
        $validated = $request->validated();
        $sound = SoundServices::storeNewSound($validated);

        ActivityLogger::activity('New sound created: '.$sound);

        return redirect('sounds')
                    ->with('success', 'Sound created: <strong>'.$sound->title.'</strong>');
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
     * @param \App\Http\Requests\SoundRequest $request
     * @param int                             $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SoundRequest $request, $id)
    {
        $validated = $request->validated();
        $sound = SoundServices::updateSound(SoundServices::getSound($id), $validated);

        ActivityLogger::activity('Sounds updated: '.$sound);

        return redirect()
                    ->back()
                    ->with('success', 'Sound updated: <strong>'.$sound->title.'</strong>');
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
        $sound = SoundServices::deleteSound(SoundServices::getSound($id));

        ActivityLogger::activity('Sounds deleted: '.$sound);

        return redirect('sounds')->with('success', 'Sound deleted <strong>'.$sound->title.'</strong>');
    }
}
