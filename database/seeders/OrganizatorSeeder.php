<?php

namespace Database\Seeders;

use App\Models\Organizator;
use Illuminate\Database\Seeder;

class OrganizatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizator::factory()
            ->times(20)
            ->create();
    }
}
