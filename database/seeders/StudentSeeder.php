<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $totalUsers = 400; // Общее количество пользователей
        $batchSize = 40; // Размер батча
        $batchCount = $totalUsers / $batchSize; // Количество батчей

        for ($batch = 1; $batch <= $batchCount; $batch++) {
            $users = [];

            for ($i = 0; $i < $batchSize; $i++) {
                $users[] = [
                    'first_name' => fake()->firstName(),
                    'middle_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'login' => fake()->unique()->userName(),
                    'password' => Hash::make(123123123),
                    'profile' => 'public/profiles/admin.png',
                    'role' => 'student',
                    // 'group_id' => Group::inRandomOrder()->first()->id, // Можно добавить по мере необходимости
                ];
            }

            User::insert($users);

            // Optional: pause between batches to reduce load
             sleep(1);
        }
    }

}
