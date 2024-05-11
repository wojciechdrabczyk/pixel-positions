<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory()->count(5)->create(new Sequence([
            'featured' => false,
            'schedule' => 'Full Time'

        ], [
            'featured' => true,
            'schedule' => 'Part Time'
        ]))->each(function (Job $job) {
            $tags = Tag::inRandomOrder()->take(2)->get();
            $job->tags()->attach($tags->pluck('id'));
        });
    }
}
