<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use App\Models\Theme;
use App\Models\User;


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
        $user           = auth()->user();
        $users          = User::all();
        $themes         = Theme::enabledThemes()->get();

        $data = [
            'sounds'        => $sounds,
            'enabledSounds' => $enabledSounds,
            'user'          => $user,
            'users'         => $users,
            'themes'        => $themes,
        ];

        return view('pages.dashboard', $data);
    }
}
