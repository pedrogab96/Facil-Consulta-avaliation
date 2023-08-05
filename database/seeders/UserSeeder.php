<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'christian.ramires@example.com',
        ]);

        User::factory()->create([
            'email' => 'pedrogab96@gmail.com',
            'password' => 'pedro@dev',
        ]);

        User::factory()->count(4)->create();
    }
}
