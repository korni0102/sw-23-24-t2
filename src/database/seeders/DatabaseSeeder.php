<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Job;
use App\Models\Role;
use App\Models\RoleRequest;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StudyProgram;
use App\Models\Contact;
use App\Models\Contract;
use App\Models\Feedback;
use Illuminate\Support\Str;


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
        $user->address = "Nitra, Mariánska 11";
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
        $user->address = "Nitra, Mariánska 1";
        $user->tel = "888888";
        $user->year = "2022";
        $user->role_id = "2";
        $user->study_program_id = "1";
        $user->password = bcrypt("adminadmin");
        $user->save();

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '2',
            'accepted' => true
        ]);

        //contact ------------------------------
        $contact = new Contact();
        $contact->firstname = "Jozo";
        $contact->lastname = "Mrkvicka";
        $contact->tel = "0918181818";
        $contact->email = "jozomrkvicka@gmail.com";
        $contact->company_id = 2;
        $contact->save();

        $contact = new Contact();
        $contact->firstname = "Jano";
        $contact->lastname = "Kapusta";
        $contact->tel = "0905151515";
        $contact->email = "janokapusta@gmail.com";
        $contact->company_id = 4;
        $contact->save();

        //job ---------------------------------
        $job = new Job();
        $job->company_id = 1;
        $job->contact_id = 1;
        $job->job_type = "parttime";
        $job->name = 'Programovanie v jazyku PHP';
        $job->description = 'asdasdasd';
        $job->save();

        $job = new Job();
        $job->company_id = 2;
        $job->contact_id = 2;
        $job->job_type = "fulltime";
        $job->name = 'Programovanie v jazyku Java';
        $job->description = 'asdasdasd';
        $job->save();

        $job = new Job();
        $job->company_id = 3;
        $job->contact_id = 2;
        $job->job_type = "paid";
        $job->name = 'Programovanie v jazyku Huskell';
        $job->description = 'asdsadasdasdasdasda';
        $job->save();

        $job = new Job();
        $job->company_id = 4;
        $job->contact_id = 1;
        $job->job_type = "unpaid";
        $job->name = 'Programovanie v jazyku Python';
        $job->description = 'pythonpythonpythhon';
        $job->save();


        //contract -----------------------------
        $contract = new Contract();
        $contract->user_id = 1;
        $contract->job_id = 1;
        $contract->from = '2023-11-01';
        $contract->to = '2022-11-30';
        $contract->accepted = true;
        $contract->closed = false;
        $contract->save();

        $contract = new Contract();
        $contract->user_id = 2;
        $contract->job_id = 2;
        $contract->from = '2023-11-10';
        $contract->to = '2022-12-10';
        $contract->accepted = true;
        $contract->closed = false;
        $contract->save();

        // users -------------------------------
        $user = new User();
        $user->firstname = "Jano";
        $user->lastname = "Kiss";
        $user->email = "ppp@ppp.com";
        $user->address = "Nitra, Trieda Andreja Hlinku 13";
        $user->tel = "888888528";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "3";
        $user->password = bcrypt("adminadmin");
        $user->save();

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        //feedbacks --------------------------------

        $feedback = new Feedback();
        $feedback->text = Str::random(100);
        $feedback->contract_id = 1;
        $feedback->user_id = 1;
        $feedback->contact_id = 1;
        $feedback->save();

        $feedback = new Feedback();
        $feedback->text = Str::random(100);
        $feedback->contract_id = 2;
        $feedback->user_id = 2;
        $feedback->contact_id = 2;
        $feedback->save();

        // users -------------------------------
        $user = new User();
        $user->firstname = "Fero";
        $user->lastname = "Nagy";
        $user->email = "veduci@veduci.com";
        $user->address = "Nitra, Dlhá 14";
        $user->tel = "088888528";
        $user->year = "2023";
        $user->role_id = "4";
        $user->study_program_id = "3";
        $user->password = bcrypt("adminadmin");
        $user->save();

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '4',
            'accepted' => true
        ]);

        // users -------------------------------
        $user = new User();
        $user->firstname = "Jancsi";
        $user->lastname = "Velikansky";
        $user->email = "zastupca@zastupca.com";
        $user->address = "Nitra, Trieda Andreja Hlinku 13";
        $user->tel = "0988888528";
        $user->year = "2023";
        $user->role_id = "5";
        $user->study_program_id = "3";
        $user->password = bcrypt("adminadmin");
        $user->save();

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '5',
            'accepted' => true
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
