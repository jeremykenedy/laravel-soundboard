<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetSoundFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-sounds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the set of sound files from git.';

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
        echo shell_exec('git clone '.config('soundboard.soundsRepository').' '.$uploadsFolder);
        echo shell_exec('rm -f public/sound-files/LICENSE public/sound-files/README.md');
    }
}
