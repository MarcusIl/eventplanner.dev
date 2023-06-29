<?php

use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
   use HandlesAuthorization;

   public function manage(User $user)
   {
       return $user->role === 'Admin';
   }

   public function delete(User $user)
   {
       return $user->role === 'Admin';
   }

   // Add more authorization methods for other actions as needed
}