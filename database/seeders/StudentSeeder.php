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
        $totalUsers = 400; 
        $batchSize = 40; 
        $batchCount = $totalUsers / $batchSize; 

        for ($batch = 1; $batch <= $batchCount; $batch++) {
            $users = [];

            for ($i = 0; $i < $batchSize; $i++) {
                $users[] = [
                    'first_name' => fake()->firstName(),
                    'middle_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'login' => fake()->unique()->userName(),
                    'password' => Hash::make(123123123),
                    'profile' => 'storage/profiles/default.jpg',
                    'role' => 'student',
                ];
            }

            User::insert($users);

             sleep(1);
        }
    }

}
