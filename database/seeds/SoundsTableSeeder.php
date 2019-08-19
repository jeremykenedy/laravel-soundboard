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
                'file'    => '/cloned-sounds/approved.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Are you kidding me',
                'file'    => '/cloned-sounds/areYouFuckingKiddingMe.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Are you recording me right now',
                'file'    => '/cloned-sounds/areYouRecordingMeRightNow.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Do your planks',
                'file'    => '/cloned-sounds/doYourPlanks.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Expense Approved',
                'file'    => '/cloned-sounds/expenseApproved.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Have Faith',
                'file'    => '/cloned-sounds/haveFailth.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Hmmm',
                'file'    => '/cloned-sounds/hmmm.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Huh',
                'file'    => '/cloned-sounds/huh.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'I Approve that',
                'file'    => '/cloned-sounds/iApproveThat.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'I\'ll get back to you on that',
                'file'    => '/cloned-sounds/illGetBackToYouOneThat.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sigh',
                'file'    => '/cloned-sounds/JK-sigh.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sorry I have a meeting',
                'file'    => '/cloned-sounds/sorryIHaveAMeeting.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sounds like a feature',
                'file'    => '/cloned-sounds/soundsLikeAFeature.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Sounds like a plan',
                'file'    => '/cloned-sounds/soundsLikeAPlan.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Tell me how you feel',
                'file'    => '/cloned-sounds/tellMeHowYouFeel.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Thats a bug',
                'file'    => '/cloned-sounds/thatsABug.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Well thats a game changer',
                'file'    => '/cloned-sounds/wellThatsAGameChanger.wav',
            ],
            [
                'enabled' => 1,
                'title'   => 'Yeah sure',
                'file'    => '/cloned-sounds/yeahSure.wav',
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
