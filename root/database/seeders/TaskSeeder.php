<?php

namespace Database\Seeders;

use App\Models\Task;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Task::factory()
            ->count(20)
            ->make()
            ->each(function($task) {
                $task->user_id = rand(1, 4);
                $task->save();
            });
    }
}
