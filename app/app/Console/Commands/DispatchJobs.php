<?php

namespace App\Console\Commands;

use App\Jobs\ProcessPodcast;
use Illuminate\Console\Command;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DispatchJobs extends Command
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ProcessPodcast::dispatch()->onQueue('someQueue');//->onConnection('redis');
        echo 'ok';
    }
}
