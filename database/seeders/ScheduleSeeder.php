<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $groups = Group::all();
        $subjects = Subject::all();

        foreach ($groups as $group) {
            for ($day = 1; $day <= 6; $day++) { // 6 дней в неделю
                $usedSubjects = []; // Для хранения предметов, которые уже назначены на этот день

                for ($lesson = 0; $lesson < 3; $lesson++) { // 3 урока в день
                    // Фильтруем предметы, чтобы выбрать только те, которые еще не использовались в этот день
                    $availableSubjects = $subjects->reject(function ($subject) use ($usedSubjects) {
                        return in_array($subject->id, $usedSubjects);
                    });

                    if ($availableSubjects->isEmpty()) {
                        throw new \Exception('Не достаточно предметов для назначения в расписание');
                    }

                    // Выбираем случайный предмет из доступных
                    $subject = $availableSubjects->random();
                    $usedSubjects[] = $subject->id;

                    // Находим учителя, который специализируется на этом предмете
                    $teacher = User::where('role', 'teacher')
                        ->where('specialization', $subject->name)
                        ->inRandomOrder()
                        ->first();

                    if (!$teacher) {
                        throw new \Exception("Не найдено учителей для предмета {$subject->name}");
                    }

                    // Определяем время начала и окончания урока
                    $startTime = ['08:00:00', '09:40:00', '11:35:00'][$lesson];
                    $endTime = \Carbon\Carbon::createFromFormat('H:i:s', $startTime)
                        ->addMinutes(95) // 45 мин + 45 мин + 5 минут перемена
                        ->format('H:i:s');

                    // Создаем запись в таблице расписания
                    Schedule::create([
                        'group_id' => $group->id,
                        'subject_id' => $subject->id,
                        'teacher_id' => $teacher->id,
                        'day_of_week' => $day,
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                        'room' => 'A' . rand(1, 10), // Генерация случайного номера кабинета
                    ]);
                }
            }
        }
    }


}
