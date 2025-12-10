<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Evaluation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = User::all();

        foreach ($users as $user) {

            for ($i = 0; $i < 5; $i++) {
                Evaluation::create([
                    'volunteer_id' => $user->id,
                    'supervisor_id' => $users->random()->id,

                    'evaluation_date' => now()->subDays(rand(1, 90)),
                    'team_name' => 'الفريق الطبي',

                    'initial_score' => rand(1, 5),
                    'monthly_score' => rand(1, 5),
                    'posts_score' => rand(1, 5),
                    'activity_score' => rand(1, 5),

                    'supervisor_opinion' => 'مجهود جيد وفي تحسن.',
                    'new_ideas_score' => rand(1, 5),
                    'creativity_score' => rand(1, 5),
                    'commitment_score' => rand(1, 5),
                    'meetings_attendance' => rand(1, 5),
                    'networking_participation' => rand(1, 5),

                    'negatives_notes' => 'لا يوجد شيء سلبي مهم.',
                    'ideas_presented' => 'اقتراح فعالية خيرية.',

                    'final_score' => rand(1, 5),
                ]);
            }
        }
    }
}
