<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $directions = ['ППК', 'СПК', 'АСОИ', 'ЭНК'];

        // Получаем уникальных учителей и студентов
        $teachers = User::where('role', 'teacher')->get();
        $students = User::where('role', 'student')->get();

        if ($teachers->count() < 1 || $students->count() < 1) {
            throw new \Exception('Не достаточно учителей или студентов для создания групп');
        }

        // Перемешиваем коллекции, чтобы использовать их случайно
        $teachers = $teachers->shuffle();
        $students = $students->shuffle();

        $teacherIndex = 0;
        $studentIndex = 0;

        foreach ($directions as $direction) {
            $groupCount = 5;

            for ($i = 1; $i <= $groupCount; $i++) {
                // Получаем следующего уникального учителя и студента
                $curator = $teachers[$teacherIndex % $teachers->count()];
                $headman = $students[$studentIndex % $students->count()];

                Group::create([
                    'name' => "{$direction}-9-{$i}-24",
                    'curator_id' => $curator->id,
                    'headman_id' => $headman->id,
                ]);

                $teacherIndex++;
                $studentIndex++;
            }
        }
    }

}
