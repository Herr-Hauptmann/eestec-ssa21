<?php

namespace Database\Seeders;

use App\Models\Trening;
use Illuminate\Database\Seeder;

class TreningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trening::factory()
            ->times(20)
            ->create();
    }
}
