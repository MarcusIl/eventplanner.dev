<?php

namespace App\Listeners;

use App\Models\Role;
use Illuminate\Auth\Events\Registered;

class AssignGuestRole
{
    public function handle(Registered $event)
    {
        // Retrieve the "Guest" role
        $guestRole = Role::where('name', 'Guest')->first();

        // Assign the "Guest" role to the registered user
        $event->user->roles()->attach($guestRole);
    }
}
