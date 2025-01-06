<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employer = Employer::factory(6)->create();

        Job::factory(20)->create([
            'employer_id' => fn () => $employer->random()->id,
        ]);
    }
}
