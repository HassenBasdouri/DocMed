<?php

use App\RendezVous;
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
        // $this->call(UserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(RencontreSeeder::class);
        $this->call(RendezVousSeeder::class);
        $this->call(ImageSeeder::class);
    }
}
