<?php
use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;
class EventPolicy
{
   use HandlesAuthorization;

   public function manage(User $user)
   {
       return in_array($user->role, ['Admin', 'Organizer']);
   }

   public function delete(User $user)
   {
       return $user->role === 'Admin';
   }

   public function view(User $user, Event $event)
   {
       return in_array($user->role, ['Admin', 'Organizer', 'Guest']);
   }

   public function create(User $user)
   {
       return in_array($user->role, ['Admin', 'Organizer']);
   }

   public function manageGuests(User $user, Event $event)
   {
       return $user->role === 'Organizer' && $event->organizer_id === $user->id;
   }

   public function manageRSVPs(User $user, Event $event)
   {
       return in_array($user->role, ['Admin', 'Organizer']) || ($user->role === 'Guest' && $event->guest_id === $user->id);
   }

   public function assignTasks(User $user, Event $event)
   {
       return in_array($user->role, ['Admin', 'Organizer']) || ($user->role === 'Guest' && $event->guest_id === $user->id);
   }

   public function manageBudgets(User $user, Event $event)
   {
       return in_array($user->role, ['Admin', 'Organizer']) || ($user->role === 'Guest' && $event->guest_id === $user->id);
   }

   // Add more authorization methods for other actions as needed
}
