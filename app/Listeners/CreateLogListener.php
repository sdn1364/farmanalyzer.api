<?php

namespace App\Listeners;

use App\Events\CreateLogEvent;
use App\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateLogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateLogEvent  $event
     * @return void
     */
    public function handle(CreateLogEvent $event)
    {
        Log::create(['message'=>$event->message]);
    }
}
