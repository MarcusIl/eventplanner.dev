<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];


    public function boot()
{
   $this->registerPolicies();

   Gate::define('manage-users', function ($user) {
       return $user->role === 'Admin';
   });

   Gate::define('manage-events', function ($user) {
       return in_array($user->role, ['Admin', 'Organizer']);
   });

   Gate::define('manage-system-settings', function ($user) {
       return $user->role === 'Admin';
   });

   Gate::define('delete-offensive-accounts', function ($user) {
       return $user->role === 'Admin';
   });

   Gate::define('create-event', function ($user) {
       return in_array($user->role, ['Admin', 'Organizer']);
   });

   Gate::define('manage-guests', function ($user, $event) {
       return $user->role === 'Organizer' && $event->organizer_id === $user->id;
   });

   Gate::define('manage-rsvps', function ($user, $event) {
       return in_array($user->role, ['Admin', 'Organizer']) || ($user->role === 'Guest' && $event->guest_id === $user->id);
   });

   Gate::define('assign-tasks', function ($user, $event) {
       return in_array($user->role, ['Admin', 'Organizer']) || ($user->role === 'Guest' && $event->guest_id === $user->id);
   });

   Gate::define('manage-budgets', function ($user, $event) {
       return in_array($user->role, ['Admin', 'Organizer']) || ($user->role === 'Guest' && $event->guest_id === $user->id);
   });

   // Add more gate definitions for other actions as needed
}
}