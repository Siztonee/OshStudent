<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\GroupSeeder;
use Database\Factories\UserFactory;
use Database\Seeders\StudentSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\TeacherSeeder;
use Database\Seeders\ScheduleSeeder;
use Database\Seeders\UserGroupSeeder;
use Database\Factories\ScheduleFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(TeacherSeeder::class);
        // $this->call(StudentSeeder::class);
        // $this->call(GroupSeeder::class);
        // $this->call(UserGroupSeeder::class);
        // $this->call(SubjectSeeder::class);
        // $this->call(ScheduleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
