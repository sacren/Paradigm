<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the user database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}
