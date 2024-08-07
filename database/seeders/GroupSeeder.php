<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $directions = ['ППК', 'ТОСВТ', 'ПОВТАС', 'ЭНК'];

        foreach ($directions as $direction) {
            $groupCount = rand(5, 7);
            for ($i = 1; $i <= $groupCount; $i++) {
                Group::factory()->create([
                    'name' => "{$direction}-9-{$i}-24"
                ]);
            }
        }
    }
}
