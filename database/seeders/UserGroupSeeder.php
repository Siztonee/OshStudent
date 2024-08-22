<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Получаем все группы
        $groups = Group::all();

        if ($groups->count() < 1) {
            throw new \Exception('Не достаточно групп для назначения пользователям');
        }

        $students = User::where('role', 'student')->get();

        $studentsPerGroup = 20;
        if ($students->count() < $groups->count() * $studentsPerGroup) {
            throw new \Exception('Не достаточно студентов для назначения по группам');
        }

        foreach ($groups as $group) {
            $groupStudents = $students->splice(0, $studentsPerGroup);

            $groupStudents->each(function ($student) use ($group) {
                $student->update(['group_id' => $group->id]);
            });
        }
    }

}
