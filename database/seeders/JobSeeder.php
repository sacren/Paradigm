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
        $employer = Employer::all();

        if ($employer->isEmpty()) {
            $this->call(EmployerSeeder::class);
            $employer = Employer::all();
        }

        Job::factory(20)->create([
            'employer_id' => fn () => $employer->random()->id,
        ]);
    }
}
