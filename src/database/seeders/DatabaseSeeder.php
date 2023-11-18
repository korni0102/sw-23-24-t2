<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Role;
use App\Models\RoleRequest;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StudyProgram;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roleNames = [
            "Admin",
            "Student",
            "PPP",
            "Veduci pracoviska",
            "Zástupca"
        ];

        foreach ($roleNames as $roleName) {
            $role = new Role();
            $role->role = $roleName;
            $role->save();
        }


        $studyprograms = [
            'Aplikovaná ekológia a environmentalistika',
            'Aplikovaná informatika',
            'Biológia',
            'Fyzika',
            'Geografia v regionálnom rozvoji',
            'Matematicko-štatistické a informačné metódy v ekonómii a finančníctve',
            'Učiteľstvo biológie v kombinácii',
            'Učiteľstvo chémie v kombinácii',
            'Učiteľstvo ekológie v kombinácii',
            'Učiteľstvo fyziky v kombinácii',
            'Učiteľstvo geografie v kombinácii',
            'Učiteľstvo informatiky v kombinácii',
            'Učiteľstvo matematiky v kombinácii',
            'Učiteľstvo odborných ekonomických predmetov v kombinácii',
        ];

        foreach ($studyprograms as $studyprogram) {
            $study_program = new StudyProgram();
            $study_program->name = $studyprogram;
            $study_program->save();
        }

        $companyInfo = [
            [
                'name' => 'Uniqa',
                'address' => 'Nitra Sturova 58'
            ],
            [
                'name' => 'Siemens',
                'address' => 'Nitra Trieda Andreja Hlinku 13'
            ],
            [
                'name' => 'Unicorn',
                'address' => 'Nitra Dlhá 82'
            ],
            [
                'name' => 'Jaguar',
                'address' => 'Nitra NCentro 15'
            ],
            [
                'name' => 'Land Rover',
                'address' => 'Nitra Frana Mojtu 178'
            ],

        ];

        foreach ($companyInfo as $info) {
            $company = new Company();
            $company->name = $info['name'];
            $company->address = $info['address'];
            $company->save();
        }

        $user = new User();
        $user->firstname = "meno";
        $user->lastname = "admin";
        $user->email = "admin@admin.com";
        $user->tel = "9999999";
        $user->year = "2023";
        $user->role_id = "1";
        $user->study_program_id = "1";
        $user->password = bcrypt("adminadmin");
        $user->save();

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '1',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "meno";
        $user->lastname = "student";
        $user->email = "student@student.com";
        $user->tel = "888888";
        $user->year = "2022";
        $user->role_id = "2";
        $user->study_program_id = "1";
        $user->password = bcrypt("adminadmin");
        $user->save();

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '1',
            'accepted' => true
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
