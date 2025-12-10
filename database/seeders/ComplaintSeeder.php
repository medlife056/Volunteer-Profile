<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ComplaintSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Complaint::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = User::all();

        foreach ($users as $u) {
            for ($i = 0; $i < 3; $i++) {
                Complaint::create([
                    'volunteer_id' => $u->id,
                    'content' => 'هذه شكوى تجريبية تخص المتطوع.',
                    'status' => 'pending',
                ]);
            }
        }
    }
}
