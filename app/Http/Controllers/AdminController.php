<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use App\Models\Theme;
use App\Models\User;
use App\Services\SoundServices;

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
        $sounds = Sound::sortedSounds()->get();
        $enabledSounds = Sound::enabledSounds()->sortedSounds()->get();
        $user = auth()->user();
        $users = User::all();
        $themes = Theme::enabledThemes()->get();
        $SoundFiledata = SoundServices::checkAndPullSoundsAndRecordings();

        $data = [
            'sounds'        => $sounds,
            'enabledSounds' => $enabledSounds,
            'user'          => $user,
            'users'         => $users,
            'themes'        => $themes,
        ];
        $data = array_merge($data, $SoundFiledata);

        return view('pages.dashboard', $data);
    }

    /**
     * Show the application filemanager.
     *
     * @return \Illuminate\View\View
     */
    public function filemanager()
    {
        $data = SoundServices::checkAndPullSoundsAndRecordings();

        return view('pages.filemanager', $data);
    }
}
