<?php

namespace App\Http\Controllers;

use App\Models\Sound;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sounds         = Sound::sortedSounds()->get();
        $enabledSounds  = Sound::enabledSounds()->sortedSounds()->get();

        $data = [
            'sounds'        => $sounds,
            'enabledSounds' => $enabledSounds,
        ];

        return view('dashboard', $data);
    }
}
