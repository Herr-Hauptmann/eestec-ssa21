<?php

namespace Database\Seeders;

use App\Models\Medij;
use Illuminate\Database\Seeder;

class MedijSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medij::factory()
            ->times(40)
            ->create();
    }
}
