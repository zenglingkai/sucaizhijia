<?php

namespace App\Listeners\User;

use App\Events\User\AddUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddUserListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * @param AddUserEvent $event
     */
    public function handle(AddUserEvent $event)
    {

    }
}
