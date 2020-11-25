<?php

namespace Database\Seeders;

use App\Models\Organizator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Organizator::factory(50)->create();
        // $this->call(Organizator::class);
    }
}
