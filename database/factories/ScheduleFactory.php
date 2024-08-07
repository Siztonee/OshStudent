<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Schedule::class;

    public function definition()
    {
        $startTimes = [
            '08:00:00', '09:40:00', '11:35:00'
        ];

        $subjects = [
            'Математика', 'Физика', 'Химия', 'Биология', 'История Кыргызстана',
            'География', 'Русская Литература', 'Английский язык', 'Русский язык',
            'Верстка Веб-Сайтов', 'PHP', 'Операционные Системы', 'Дизайн'
        ];

        $teachers = [
            'Mr. Smith', 'Mrs. Johnson', 'Mr. Williams', 'Ms. Brown', 'Mr. Jones',
            'Mrs. Garcia', 'Mr. Miller', 'Ms. Davis', 'Mr. James', 'Mr. Teddy', 'Mrs. Maria'
        ];

        $rooms = range(1, 55);

        return [
            'group_id' => Group::inRandomOrder()->first()->id,
            'day_of_week' => $this->faker->numberBetween(1, 6),
            'start_time' => $this->faker->randomElement($startTimes),
            'end_time' => function (array $attributes) {
                $startTime = \Carbon\Carbon::createFromFormat('H:i:s', $attributes['start_time']);
                return $startTime->addMinutes(95)->format('H:i:s');
            },
            'subject' => $this->faker->randomElement($subjects),
            'teacher' => $this->faker->randomElement($teachers),
            'room' => $this->faker->randomElement($rooms)
        ];
    }
}
