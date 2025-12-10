<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SupervisorRating;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SupervisorRatingSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SupervisorRating::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = User::all();

        foreach ($users as $volunteer) {

            for ($i = 0; $i < 3; $i++) {

                $supervisor = $users->where('id', '!=', $volunteer->id)->random();

                SupervisorRating::create([
                    'volunteer_id' => $volunteer->id,
                    'supervisor_id' => $supervisor->id,

                    'activity_score' => rand(1, 5),
                    'behavior_score' => rand(1, 5),
                    'motivation_score' => rand(1, 5),
                    'scientific_skill_score' => rand(1, 5),

                    'pros_cons' => 'عمل جيد وتعاون ممتاز.',
                    'fairness_score' => rand(1, 5),
                    'team_quality_score' => rand(1, 5),
                    'tasks_distribution_fairness' => rand(1, 5),
                    'general_supervisor_time' => rand(1, 5),


                    'management_behavior' => 'مرن',
                    'space_given' => 'مساحة جيدة',
                    'listening_and_suggestions' => 'ينصت جيداً',
                ]);
            }
        }
    }
}
