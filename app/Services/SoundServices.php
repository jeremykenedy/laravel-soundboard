<?php

namespace App\Services;

use App\Models\Sound;
use Illuminate\Support\Facades\File;

class SoundServices
{
    /**
     * Get the Sounds from Database.
     *
     * @param int $id Sound Id
     *
     * @return Collection The Sound
     */
    public static function getSound($id)
    {
        if (!$id) {
            return abort(404);
        }

        return Sound::findOrFail($id);
    }

    public static function getAllSounds()
    {
        return Sound::all();
    }

    /**
     * Gets the sorted sounds.
     *
     * @return collection The sorted sounds.
     */
    public static function getSortedSounds()
    {
        return Sound::sortedSounds()->get();
    }

    /**
     * Gets the enabled and sorted sounds.
     *
     * @return collection The enabled sorted sounds.
     */
    public static function getEnabledSortedSounds()
    {
        return Sound::enabledSounds()->sortedSounds()->get();
    }

    /**
     * Gets the blank sound.
     *
     * @return Empty Sound Collection.
     */
    public static function getBlankSound()
    {
        return new Sound();
    }

    /**
     * Update a sound.
     *
     * @param collection $sound     The sound
     * @param array      $soundData The sound data
     *
     * @return Collection Sound
     */
    public static function updateSound(Sound $sound, $soundData)
    {
        $sound->fill($soundData);
        $sound->save();

        return $sound;
    }

    /**
     * Update a sound enabled/disabled.
     *
     * @param int  $soundId The sound identifier
     * @param bool $status  The status
     *
     * @return collection \App\Models\Sound\Sound $sound
     */
    public static function updateSoundStatus($soundId, $status)
    {
        $sound = self::getSound($soundId);
        $sound->enabled = $status;
        $sound->save();

        return $sound;
    }

    /**
     * Stores a new sound.
     *
     * @param array $soundData The sound data
     *
     * @return collection $newSound The newly stored sound
     */
    public static function storeNewSound($soundData)
    {
        $lastSound = collect(Sound::sortedSounds()->get())->last();
        $sort_order = ['sort_order' => $lastSound->sort_order + 1];
        $newSound = Sound::create(array_merge($soundData, $sort_order));

        return $newSound;
    }

    /**
     * Delete a sound.
     *
     * @param collection $sound The sound
     *
     * @return Collection of deleted Sound
     */
    public static function deleteSound(Sound $sound)
    {
        $sound->delete();

        return $sound;
    }

    /**
     * Check for sounds and recording file directory existance and get any files contained within.
     *
     * @return array of collections
     */
    public static function checkAndPullSoundsAndRecordings()
    {
        $uploadedFilePath = config('soundboard.folders.uploads') . "/";
        $recordedFilePath = $uploadedFilePath . config('soundboard.folders.recordings') . "/";
        $fileTypes = 'wav';

        if (!File::exists($uploadedFilePath)) {
            File::makeDirectory($uploadedFilePath);
        }

        if (!File::exists($recordedFilePath)) {
            File::makeDirectory($recordedFilePath);
        }

        $uploadfilesNames = collect(preg_grep('~\.(' . $fileTypes . ')$~', scandir($uploadedFilePath)));
        $recordedfilesNames = collect(preg_grep('~\.(' . $fileTypes . ')$~', scandir($recordedFilePath)));

        $data = [
            'uploadfilesNames'  => $uploadfilesNames,
            'recordedfilesNames'  => $recordedfilesNames,
        ];

        return $data;
    }
}
