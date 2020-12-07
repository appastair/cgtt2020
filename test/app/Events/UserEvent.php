<?php

namespace App\Events;
use Log;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class UserEvent extends Event
{
    /**
     * An event for Broadcasting upon a user being added, updated or deleted.
     * @param  string $path
     * @param  User $user
     * @return void
     */
    public function __construct($path,$user)
    {
        Log::info(['path'=>$path,'user'=>$user->id]);
    }
}
