<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetSeededSoundFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-seeded-sounds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the set of sound files from git to work with the seeded sounds.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $uploadsFolder = 'public/'.config('soundboard.folders.uploads');

        echo shell_exec('rm -R -f '.$uploadsFolder);
        echo shell_exec('git clone '.config('soundboard.seededSoundsRepository').' '.$uploadsFolder);
        echo shell_exec('rm -f '.$uploadsFolder.'/LICENSE '.$uploadsFolder.'/README.md');
    }
}
