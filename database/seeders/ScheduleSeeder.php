<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Schedule;
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

        foreach ($groups as $group) {
            for ($day = 1; $day <= 6; $day++) { // 5 дней в неделю
                for ($lesson = 0; $lesson < 3; $lesson++) { // 3 урока в день
                    Schedule::factory()->create([
                        'group_id' => $group->id,
                        'day_of_week' => $day,
                        'start_time' => ['08:00:00', '09:40:00', '11:35:00'][$lesson],
                        'end_time' => \Carbon\Carbon::createFromFormat('H:i:s', ['08:00:00', '09:40:00', '11:35:00'][$lesson])
                            ->addMinutes(95)
                            ->format('H:i:s'),
                    ]);
                }
            }
        }
    }
}
