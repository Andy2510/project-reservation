<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      //$faker->name();

      foreach (range(1,10) as $x) {
        $user = new Dish;
        $user->title = $faker->firstNameFemale;
        $user->description = $faker->text($maxNbChars = 80);
        $user->price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 25);
        $user->imageUrl = $faker->imageUrl($width = 400, $height = 200, 'food');

        $user->save();
      }
    }
}
