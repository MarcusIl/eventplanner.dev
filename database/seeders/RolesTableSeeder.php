<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Organizer'],
            ['name' => 'Guest'],
        ];

        DB::table('roles')->insert($roles);

        // Retrieve the "Guest" role
        $guestRole = Role::where('name', 'Guest')->first();

        // Assign the "Guest" role to all existing users
        User::all()->each(function ($user) use ($guestRole) {
            $user->roles()->syncWithoutDetaching([$guestRole->id]);
        });
    }
}
