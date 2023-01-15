<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.admin',
            'password' => \Illuminate\Support\Facades\Hash::make('superadmin'),
            'current_team_id' => 1
        ]);

        $team = \App\Models\Team::factory()->create([
            'id' => $user->current_team_id,
            'user_id' => $user->id
        ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@admin.admin',
            'password' => \Illuminate\Support\Facades\Hash::make('superadmin'),
            'current_team_id' => 1
        ]);
        $drugs = \App\Models\Drugs::factory()->count(3)
            ->state(new Sequence(['code' => 'D01', 'drug' => 'Marijuana'], ['code' => 'D02', 'drug' => 'Synthetic cannabinoids'], ['code' => 'D03', 'drug' => 'Ecstasy']))
            ->create();

        $symptoms = new Sequence(
            ['code' => 'S01', 'symptom' => 'Merasa senang dan "tinggi"'],
            ['code' => 'S02', 'symptom' => 'Tekanan darah dan detak jantung naik'],
            ['code' => 'S03', 'symptom' => 'Mata merah'],
            ['code' => 'S04', 'symptom' => 'Kehilangan keseimbangan'],
            ['code' => 'S05', 'symptom' => 'Paranoid'],
            ['code' => 'S06', 'symptom' => 'Halusinasi'],
            ['code' => 'S07', 'symptom' => 'Refleks tubuh berkurang'],
            ['code' => 'S08', 'symptom' => 'Kehilangan kesadaran'],
            ['code' => 'S09', 'symptom' => 'Cenderung bertindak kasar'],
            ['code' => 'S10', 'symptom' => 'Merasa gusar dan cemas'],
            ['code' => 'S11', 'symptom' => 'Cenderung tenang dan berkeringat'],
            ['code' => 'S12', 'symptom' => 'Mulut kering'],

        );

        // \App\Models\Symptoms::factory()->count(12)->state($symptoms)->create();

        $rules = new Sequence(
            ['symptom_id' => 1, 'code' => 'R01', 'drug_id' => 1, 'probability' => 0.3],
            ['symptom_id' => 1, 'code' => 'R02', 'drug_id' => 2, 'probability' => 0.3],
            ['symptom_id' => 2, 'code' => 'R03', 'drug_id' => 3, 'probability' => 0.6],
            ['symptom_id' => 3, 'code' => 'R04', 'drug_id' => 1, 'probability' => 0.5],
            ['symptom_id' => 4, 'code' => 'R05', 'drug_id' => 1, 'probability' => 0.3],
            ['symptom_id' => 4, 'code' => 'R06', 'drug_id' => 3, 'probability' => 0.3],
            ['symptom_id' => 5, 'code' => 'R07', 'drug_id' => 1, 'probability' => 0.35],
            ['symptom_id' => 5, 'code' => 'R08', 'drug_id' => 3, 'probability' => 0.35],
            ['symptom_id' => 6, 'code' => 'R09', 'drug_id' => 2, 'probability' => 0.4],
            ['symptom_id' => 6, 'code' => 'R10', 'drug_id' => 3, 'probability' => 0.4],
            ['symptom_id' => 7, 'code' => 'R11', 'drug_id' => 1, 'probability' => 0.6],
            ['symptom_id' => 8, 'code' => 'R12', 'drug_id' => 3, 'probability' => 0.7],
            ['symptom_id' => 9, 'code' => 'R13', 'drug_id' => 2, 'probability' => 0.6],
            ['symptom_id' => 10, 'code' => 'R14', 'drug_id' => 2, 'probability' => 0.8],
            ['symptom_id' => 11, 'code' => 'R15', 'drug_id' => 3, 'probability' => 0.7],
            ['symptom_id' => 12, 'code' => 'R16', 'drug_id' => 1, 'probability' => 0.45],
        );
        \App\Models\Rules::factory()->count(16)->state($rules)->create();
    }
}
