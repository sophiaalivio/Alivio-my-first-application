<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create employers first
        $employers = \App\Models\Employer::factory(5)->create();

        // Create some tags
        $tags = \App\Models\Tag::factory(10)->create();

        // Create jobs for random employers
        \App\Models\Job::factory(20)->create([
            'employer_id' => $employers->random()->id,
        ])->each(function ($job) use ($tags) {
            $job->tags()->attach($tags->random(2));
        });
    }
}
