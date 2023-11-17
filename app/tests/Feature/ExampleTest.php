<?php

namespace Tests\Feature;

use App\Jobs\ProcessPodcast;
use Illuminate\Support\Facades\Queue;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_job(): void
    {
        Queue::fake();

        ProcessPodcast::dispatch()->onQueue('someQueue');//->onConnection('redis');

        Queue::assertPushedOn('someQueue', ProcessPodcast::class, function ($job) {
            return true;
        });
    }
}
