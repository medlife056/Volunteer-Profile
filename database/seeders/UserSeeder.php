<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $names = [
            'أحمد خليل', 'سارة علي', 'محمد عبد الله', 'مريم خالد',
            'نور حسن', 'جمال يوسف', 'أماني ديب', 'ريم عماد',
            'طارق سامر', 'هدى حمزة'
        ];

        foreach ($names as $name) {

            // تحديد الجنس بناءً على الاسم (تقريبي)
            $gender = preg_match('/(سارة|مريم|نور|أماني|ريم|هدى)/u', $name) ? 'women' : 'men';

            // صورة عشوائية من randomuser.me
            $photoUrl = 'https://randomuser.me/api/portraits/' . $gender . '/' . rand(0, 99) . '.jpg';

            User::create([
                'full_name' => $name,
                'phone' => '09' . rand(10000000, 99999999),
                'national_id' => rand(100000000, 999999999),
                'dob' => now()->subYears(rand(20, 30)),
                'governorate' => 'Damascus',
                'address' => 'Some Address Here',
                'qualification' => 'Bachelor',
                'university' => 'Damascus University',
                'academic_year' => '4',
                'date_of_joining' => now()->subMonths(rand(1, 12)),
                'working_hours' => rand(2, 6) . ' ساعات',
                'specialization' => 'طب',
                'hospital' => 'المجتهد',
                'academic_status' => 'مُسجّل',
                'rating' => rand(1, 5),
                'notes' => 'مستخدم تجريبي',
                'photo_path' => $photoUrl,
                'agreed_to_policy' => 1,
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
