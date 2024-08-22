<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'Математика', 'Физика', 'Химия', 'Биология', 'История Кыргызстана',
            'География', 'Русская Литература', 'Английский язык', 'Русский язык',
            'Верстка Веб-Сайтов', 'PHP', 'Операционные Системы', 'Дизайн', 'Алгоритмы',
            'Vue'
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name' => $subject
            ]);
        }

    }
}
