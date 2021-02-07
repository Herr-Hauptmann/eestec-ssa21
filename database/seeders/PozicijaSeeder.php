<?php

namespace Database\Seeders;

use App\Models\Pozicija;
use Illuminate\Database\Seeder;

class PozicijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pozicija::factory()
            ->times(10)
            ->create();
    }
}
