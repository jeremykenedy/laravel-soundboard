<?php

namespace App\Services;

use App\Models\Sound;

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
        return new Sound;
    }

    /**
     * Update a sound
     *
     * @param collection $sound     The sound
     * @param array $soundData      The sound data
     *
     * @return Collection Sound
     */
    public static function updateSound($sound, $soundData)
    {
        $sound->fill($soundData);
        $sound->save();

        return $sound;
    }

    /**
     * Stores a new sound.
     *
     * @param array $soundData  The sound data
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
     * Delete a sound
     *
     * @param collection $sound  The sound
     *
     * @return Collection of deleted Sound
     */
    public static function deleteSound($sound)
    {
        $sound->delete();

        return $sound;
    }
}
