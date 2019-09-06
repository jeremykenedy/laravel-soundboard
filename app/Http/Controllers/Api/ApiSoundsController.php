<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sound;
use App\Services\SoundServices;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class ApiSoundsController extends Controller
{
    use ActivityLogger;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sounds = SoundServices::getEnabledSortedSounds();

        ActivityLogger::activity('All Sounds loaded from API');

        return response()->json($sounds);
    }

    /**
     * Update the sort order.
     *
     * @param \Illuminate\Http\Request $request The request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAllSortOrder(Request $request)
    {
        UserServices::checkIsUserAdminOrHigher($request->userId);

        $this->validate($request, [
            'sounds.*.sort_order' => 'required|numeric',
        ]);

        $sounds = SoundServices::getAllSounds();

        foreach ($sounds as $sound) {
            $id = $sound->id;
            foreach ($request->sounds as $soundsNew) {
                if ($soundsNew['id'] == $id) {
                    $sound->update(['sort_order' => $soundsNew['sort_order']]);
                }
            }
        }

        ActivityLogger::activity('Sounds sort order updated');

        return response()->json([
            'message' => trans('admin.messages.sort-order-updated'),
        ], 200);
    }

    /**
     * Update enabled/disabled status of a sound.
     *
     * @param \Illuminate\Http\Request $request The request
     * @param int                      $id      The identifier
     *
     * @return \Illuminate\Http\Response
     */
    public function updateEnabled(Request $request, $id)
    {
        UserServices::checkIsUserAdminOrHigher($request->userId);

        $this->validate($request, [
            'sound.enabled' => 'required|boolean',
        ]);
        $sound = SoundServices::updateSoundStatus($id, $request->sound['enabled']);
        $status = 'disabled';
        if ($sound->enabled) {
            $status = 'enabled';
        }
        $message = trans('admin.messages.status-updated', ['status' => $status, 'title' => $sound->title]);

        ActivityLogger::activity($message);

        return response()->json([
            'message' => $message,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request The request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        UserServices::checkIsUserAdminOrHigher($request->userId);

        $sound = SoundServices::deleteSound(SoundServices::getSound($id));

        ActivityLogger::activity('Sounds deleted: '.$sound);

        return response()->json([
            'message' => trans('admin.messages.sound-deleted', ['title' => $sound->title]),
        ], 200);
    }

    /**
     * Handle uploads of new sound files.
     *
     * @param  Request
     *
     * @return [type]
     */
    public function uploadSound(Request $request)
    {
        UserServices::checkIsUserAdminOrHigher($request->userId);

        $file = $request->file('audio_data');

        if ($request->hasFile('audio_data') && $file->isValid()) {
            $uniqueid = uniqid();
            $original_name = $file->getClientOriginalName();
            $extension = 'wav';
            $name = $original_name.'.'.$extension;

            $path = 'sound-files/recordings/';
            $files = scandir($path);

            if (in_array($name, array_map('strtolower', $files))) {
                Log::info('its bad');

                return response()->json([
                    'error' => 'Filename already exists. Choose another filename.',
                ], 422);
            }

            $storedFile = $file->storeAs('recordings', $name, 'sound-files');

            return response()->json([
                'message' => 'File Recorded: '.$name,
            ], 202);
        }

        return response()->json([
            'error' => 'missing file or is invalid',
        ], 422);
    }
}
