<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subjects = [
            'Математика', 'Физика', 'Химия', 'Биология', 'История Кыргызстана',
            'География', 'Русская Литература', 'Английский язык', 'Русский язык',
            'Верстка Веб-Сайтов', 'PHP', 'Операционные Системы', 'Дизайн', 'Алгоритмы',
            'Vue'
        ];

        foreach ($subjects as $subject) {
            for ($i = 0; $i < 2; $i++) {
                User::create([
                    'first_name' => fake()->firstName(),
                    'middle_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'login' => fake()->unique()->userName(), // Уникальный логин
                    'password' => Hash::make(123123123),
                    'profile' => 'public/profiles/admin.png',
                    'specialization' => $subject,
                    'role' => 'teacher',
                ]);
            }
        }
    }
}
