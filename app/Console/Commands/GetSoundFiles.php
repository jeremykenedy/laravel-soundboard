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
        echo shell_exec("rm -R -f public/cloned-sounds");
        echo shell_exec("git clone https://github.com/jeremykenedy/jeremy-sound-board.git public/cloned-sounds");
    }
}
