<?php

namespace Database\Seeders;

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
        $this->call([
            OrganizatorSeeder::class,
            PozicijaSeeder::class,
            TrenerSeeder::class,
            TreningSeeder::class,
            PartnerSeeder::class,
            MedijSeeder::class,
            KategorijaSeeder::class,
            // EditionSeeder::class
        ]);
    }
}
