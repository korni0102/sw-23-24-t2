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
            [
                'name' => 'ITempire s.r.o.',
                'address' => 'Nitra Štúrova 14'
            ],
            [
                'name' => 'valllue, s.r.o.',
                'address' => 'Nitra Dlhá 178'
            ],
            [
                'name' => 'TECH IT, s.r.o.',
                'address' => 'Nitra Ďurčanskeho 8'
            ],
            [
                'name' => 'Perifer.eu Nitra',
                'address' => 'Nitra Ďurčanskeho 8'
            ],
            [
                'name' => 'Muehlbauer Technologies s.r.o.',
                'address' => 'Nitra Novozámocká 223'
            ],
        ];

        foreach ($companyInfo as $info) {
            $company = new Company();
            $company->name = $info['name'];
            $company->address = $info['address'];
            $company->save();
        }

        $user = new User();
        $user->firstname = "admin";
        $user->lastname = "admin";
        $user->email = "admin@admin.com";
        $user->address = "Nitra, Mariánska 11";
        $user->tel = "+421915582294";
        $user->year = "2023";
        $user->role_id = "1";
        $user->study_program_id = null;
        $user->password = bcrypt("adminadmin");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '1',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "student";
        $user->lastname = "student";
        $user->email = "student@student.com";
        $user->address = "Nitra, Mariánska 1";
        $user->tel = "+421915477422";
        $user->year = "2023";
        $user->role_id = "2";
        $user->study_program_id = "2";
        $user->password = bcrypt("adminadmin");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '2',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "fero";
        $user->lastname = "nagy";
        $user->email = "fero@fero.com";
        $user->address = "Nitra, Mariánska 1555";
        $user->tel = "++421914774525";
        $user->year = "2023";
        $user->role_id = "2";
        $user->study_program_id = "2";
        $user->password = bcrypt("adminadmin");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '2',
            'accepted' => true
        ]);

        //contact ------------------------------
        $contact = new Contact();
        $contact->firstname = "František";
        $contact->lastname = "Horváth";
        $contact->tel = "0918181818";
        $contact->email = "frantisekhorvath@gmail.com";
        $contact->company_id = 1;
        $contact->save();

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
        $contact->tel = "+421905151515";
        $contact->email = "janokapusta@gmail.com";
        $contact->company_id = 3;
        $contact->save();

        $contact = new Contact();
        $contact->firstname = "Marek";
        $contact->lastname = "Kovács";
        $contact->tel = "+421917452565";
        $contact->email = "marekkovacs@gmail.com";
        $contact->company_id = 4;
        $contact->save();

        $contact = new Contact();
        $contact->firstname = "Martin";
        $contact->lastname = "Kiss";
        $contact->tel = "+42130252514";
        $contact->email = "martinkiss@gmail.com";
        $contact->company_id = 5;
        $contact->save();

        //job ---------------------------------
        $job = new Job();
        $job->company_id = 1;
        $job->contact_id = 1;
        $job->job_type = "parttime";
        $job->name = 'Programovanie v jazyku PHP';
        $job->description = 'Pridajte sa k nášmu dynamickému tímu ako PHP vývojár na čiastočný úväzok. Vašou úlohou bude vyvíjať a udržiavať webové aplikácie v jazyku PHP.';
        $job->save();

        $job = new Job();
        $job->company_id = 2;
        $job->contact_id = 2;
        $job->job_type = "fulltime";
        $job->name = 'Programovanie v jazyku Java';
        $job->description = 'Hľadáme zručného Java vývojára na plný úväzok. Vašou hlavnou zodpovednosťou bude navrhovať, vyvíjať a implementovať aplikácie v jazyku Java.';
        $job->save();

        $job = new Job();
        $job->company_id = 3;
        $job->contact_id = 3;
        $job->job_type = "paid";
        $job->name = 'Programovanie v jazyku Huskell';
        $job->description = 'Zapojte sa do vzrušujúcej platené stáže ako vývojár Haskell v našom softvérovom tíme. Budete prispievať k vytváraniu riešení a získate praktické skúsenosti s Haskellom';
        $job->save();

        $job = new Job();
        $job->company_id = 4;
        $job->contact_id = 4;
        $job->job_type = "unpaid";
        $job->name = 'Programovanie v jazyku Python';
        $job->description = 'Toto je príležitosť pre začínajúceho Python vývojára zapojiť sa do neplatené stáže s možnosťou budúceho zamestnania. Budete pracovať pod vedením našich skúsených vývojárov na písaní čistého, efektívneho kódu.';
        $job->save();

        $job = new Job();
        $job->company_id = 5;
        $job->contact_id = 5;
        $job->job_type = "freelancer";
        $job->name = 'Freelance Web Development';
        $job->description = 'Hľadáme nezávislého webového vývojára na freelancerskú spoluprácu. Ako freelancer budete mať flexibilitu pracovať na projektoch podľa vlastného výberu a časového harmonogramu.';
        $job->save();


        //contract -----------------------------
        $contract = new Contract();
        $contract->user_id = 2;
        $contract->job_id = 2;
        $contract->from = '2023-11-01';
        $contract->to = '2022-11-30';
        $contract->accepted = true;
        $contract->closed = false;
        $contract->hodnotenie = null;
        $contract->ppp_id = 7;
        $contract->save();

        $contract = new Contract();
        $contract->user_id = 3;
        $contract->job_id = 3;
        $contract->from = '2023-11-01';
        $contract->to = '2022-12-01';
        $contract->accepted = true;
        $contract->closed = true;
        $contract->hodnotenie = "A";
        $contract->ppp_id = 7;
        $contract->save();

        // PPP -------------------------------
        $user = new User();
        $user->firstname = "ppp";
        $user->lastname = "ppp";
        $user->email = "ppp@ppp.com";
        $user->address = "Nitra, Trieda Andreja Hlinku 13";
        $user->tel = "+4219154114";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "2";
        $user->password = bcrypt("adminadmin");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "Regina";
        $user->lastname = "Mišovičová";
        $user->email = "rmisovicova@ukf.sk";
        $user->address = "Nitra, Dlhá 111";
        $user->tel = "+421915151515";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "1";
        $user->password = bcrypt("rmisovicova");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "Martin";
        $user->lastname = "Vozar";
        $user->email = "mvozar@ukf.sk";
        $user->address = "Nitra, Ďurčanskeho 14";
        $user->tel = "+421917181915";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "2";
        $user->password = bcrypt("mvozar");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "Dominik";
        $user->lastname = "Halvonik";
        $user->email = "dhalvonik@ukf.sk";
        $user->address = "Nitra, Trieda Andreja Hlinku 1";
        $user->tel = "+421911151617";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "2";
        $user->password = bcrypt("dhalvonik");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "Anton";
        $user->lastname = "Trník";
        $user->email = "atrnik@ukf.sk";
        $user->address = "Nitra, Štúrova 13";
        $user->tel = "+421918191614";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "4";
        $user->password = bcrypt("atrnik");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "Hilda";
        $user->lastname = "Kramáreková";
        $user->email = "hkramarekova@ukf.sk";
        $user->address = "Nitra, Svätoplukove námästie 14";
        $user->tel = "+421944959585";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "5";
        $user->password = bcrypt("hkramarekova");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '3',
            'accepted' => true
        ]);

        $user = new User();
        $user->firstname = "Júlia";
        $user->lastname = "Záhorská";
        $user->email = "jzahorska@ukf.sk";
        $user->address = "Nitra, Štúrova 15";
        $user->tel = "+421941153696";
        $user->year = "2023";
        $user->role_id = "3";
        $user->study_program_id = "6";
        $user->password = bcrypt("jzahorska");
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
        $feedback->save();

        $feedback = new Feedback();
        $feedback->text = Str::random(100);
        $feedback->contract_id = 2;
        $feedback->user_id = 2;
        $feedback->save();

        // VEDUCI -------------------------------
        $user = new User();
        $user->firstname = "Martin";
        $user->lastname = "Drlík";
        $user->email = "veduci@veduci.com";
        $user->address = "Nitra, Dlhá 14";
        $user->tel = "+421905141295";
        $user->year = "2023";
        $user->role_id = "4";
        $user->study_program_id = null;
        $user->password = bcrypt("adminadmin");
        $user->save();
        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => '4',
            'accepted' => true
        ]);

        // ZASTUPCA ---------------------------------------
        $user = new User();
        $user->firstname = "Jancsi";
        $user->lastname = "Velikansky";
        $user->email = "zastupca@zastupca.com";
        $user->address = "Nitra, Trieda Andreja Hlinku 13";
        $user->tel = "+421907040585";
        $user->year = "2023";
        $user->role_id = "5";
        $user->study_program_id = null;
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
