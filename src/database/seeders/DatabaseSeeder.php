<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
            $user->firstname = "meno";
            $user->lastname = "meno";
            $user->email = "eamil7@gmail.com";
            $user->tel = "9999999";
            $user->year = "2019";
            $user->role_id = Role::where('id', 1)->first()->id;
            $user->password = bcrypt("adminadmin");
            $user->save();
            
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
