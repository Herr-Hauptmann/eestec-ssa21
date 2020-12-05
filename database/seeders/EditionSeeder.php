<?php

namespace Database\Seeders;

use App\Models\Edicija;
use Illuminate\Database\Seeder;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Edicija::factory()
            ->times(50)
            ->hasSlike(15)
            ->create();
    }
}
