<?php

use App\Models\Sound;
use Illuminate\Database\Seeder;

class SoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folder = '/'.config('folders.uploads');
        $sounds = [
            [
                'enabled' => 1,
                'title'   => 'Approved',
                'file'    => $folder.'/approved.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Are you kidding me',
                'file'    => $folder.'/areYouFuckingKiddingMe.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Are you recording me right now',
                'file'    => $folder.'/areYouRecordingMeRightNow.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Do your planks',
                'file'    => $folder.'/doYourPlanks.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Expense Approved',
                'file'    => $folder.'/expenseApproved.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Have Faith',
                'file'    => $folder.'/haveFailth.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Hmmm',
                'file'    => $folder.'/hmmm.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Huh',
                'file'    => $folder.'/huh.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'I Approve that',
                'file'    => $folder.'/iApproveThat.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'I\'ll get back to you on that',
                'file'    => $folder.'/illGetBackToYouOneThat.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sigh',
                'file'    => $folder.'/JK-sigh.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sorry I have a meeting',
                'file'    => $folder.'/sorryIHaveAMeeting.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sounds like a feature',
                'file'    => $folder.'/soundsLikeAFeature.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sounds like a plan',
                'file'    => $folder.'/soundsLikeAPlan.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Tell me how you feel',
                'file'    => $folder.'/tellMeHowYouFeel.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Thats a bug',
                'file'    => $folder.'/thatsABug.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Well thats a game changer',
                'file'    => $folder.'/wellThatsAGameChanger.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Yeah sure',
                'file'    => $folder.'/yeahSure.wav',
            ],
        ];

        $sortOrder = 1;

        if (config('soundboard.seedSounds')) {
            foreach ($sounds as $sound) {
                $newSound = Sound::where('title', '=', $sound['title'])->first();

                if ($newSound === null) {
                    $newSound = Sound::create([
                        'enabled'       => $sound['enabled'],
                        'title'         => $sound['title'],
                        'file'          => $sound['file'],
                        'sort_order'    => $sortOrder,
                    ]);
                    $sortOrder += 1;
                }
            }

            \Artisan::call('get-seeded-sounds');
        }
    }
}
