<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KejuruanSeeder::class);
        $this->call(SubKejuruanSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(ProvinsiSeeder::class);
    }
}
