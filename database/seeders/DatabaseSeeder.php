<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Database\Factories\ListingfactoryFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

   $user= User::factory()->create([
    "name"=> "abel tegegn",
    "email" => "abelnanus11@gmail.com"
   ]);
        //  Listing::factory(6)->create([
        //     "user_id" =>$user->id
        //  ]);
        // User::factory(5)->create();

        // Listing::create([
        //     "title" => "PHP developer",
        // "tags" => "Laravel, javascript,php",
        // "company" => "ADDIS SOFTWARE PLC",
        // "location" => "addis ababa , Ethiopia",
        // "email" => "addissoftware@gmail.com",
        // "webiste" => "www.addissoftware.com",
        // "description" => "we are highering the most talented people who can help us achieve our goals",
        // ]);
        // Listing::create([
        //     "title" => "flutter developer",
        // "tags" => "Laravel, javascript",
        // "company" => "ADDIS SOFTWARE PLC",
        // "location" => "addis ababa , Ethiopia",
        // "email" => "addissoftware@gmail.com",
        // "webiste" => "www.addissoftware.com",
        // "description" => "we are highering the most talented people who can help us achieve our goals",
        // ]);

        
    }
}
