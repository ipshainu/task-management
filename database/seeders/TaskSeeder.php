<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        for ($i = 0; $i < 20; $i++) {
            Task::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
