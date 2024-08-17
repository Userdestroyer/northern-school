<?php

namespace App\Console\Commands\Writing;

use Illuminate\Console\Command;

class UploadBookFromDrive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boods:upload:from-drive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload book content from Google Drive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
