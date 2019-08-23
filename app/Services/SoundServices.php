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
}
