<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('roles')->count()==0) {
            $this->call(RoleSeeder::class);
        }

        // Group name
        if(DB::table('groups')->count()==0) {
            Group::factory(3)->create();
        }

        // User
        if(DB::table('users')->count()==0) {
            User::factory(10)->create();
        }
        
    }
}
