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
      $this->call('CountriesSeeder');
      $this->command->info('Seeded the countries!');

      $this->call('UserSeeder');
      $this->command->info('Seeded the users!');

      $this->call('DishSeeder');
      $this->command->info('Seeded the dishes!');

    }
}
