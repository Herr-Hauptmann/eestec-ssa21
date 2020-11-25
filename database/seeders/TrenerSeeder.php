<?php

namespace Database\Seeders;

use App\Models\Trener;
use Illuminate\Database\Seeder;

class TrenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trener::factory()
            ->times(15)
            ->create();
    }
}
