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
        $sounds = [
            [
                'enabled' => 1,
                'title'   => 'Approved',
                'file'    => '/sounds/approved.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Are you kidding me',
                'file'    => '/sounds/areYouFuckingKiddingMe.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Are you recording me right now',
                'file'    => '/sounds/areYouRecordingMeRightNow.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Do your planks',
                'file'    => '/sounds/doYourPlanks.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Expense Approved',
                'file'    => '/sounds/expenseApproved.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Have Faith',
                'file'    => '/sounds/haveFailth.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Hmmm',
                'file'    => '/sounds/hmmm.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Huh',
                'file'    => '/sounds/huh.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'I Approve that',
                'file'    => '/sounds/iApproveThat.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'I\'ll get back to you on that',
                'file'    => '/sounds/illGetBackToYouOneThat.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sigh',
                'file'    => '/sounds/JK-sigh.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sorry I have a meeting',
                'file'    => '/sounds/sorryIHaveAMeeting.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sounds like a feature',
                'file'    => '/sounds/soundsLikeAFeature.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sounds like a plan',
                'file'    => '/sounds/soundsLikeAPlan.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Tell me how you feel',
                'file'    => '/sounds/tellMeHowYouFeel.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Thats a bug',
                'file'    => '/sounds/thatsABug.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Well thats a game changer',
                'file'    => '/sounds/wellThatsAGameChanger.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Yeah sure',
                'file'    => '/sounds/yeahSure.wav',
            ],
        ];

        $sortOrder = 1;

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
    }
}
