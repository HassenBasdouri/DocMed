<?php

use Illuminate\Database\Seeder;

class RencontreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Rencontre::class,50)->create();
    }
}
