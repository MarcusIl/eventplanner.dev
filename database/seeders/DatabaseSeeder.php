<?php

namespace Database\Seeders;
use App\Models\Event;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Event::create(['event_name' => 'Alekša kāzas', 'event_date'=> '2024-06-24', 'event_location' => 'Rīga', 'event_description' => 'Aleksis beidzot precās']);
        Event::create(['event_name' => 'F1 Rīga', 'event_date'=> '2023-08-12', 'event_location' => 'Rīga', 'event_description' => 'F1 Grand Prix']);
        Event::create(['event_name' => 'Tusiņš', 'event_date'=> '2025-03-01', 'event_location' => 'Liepāja', 'event_description' => 'Tusiņš pie jūras']);


    }
}
