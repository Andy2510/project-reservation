<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserSeeder extends Seeder
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
          $user = new User;
          $user->name = $faker->firstNameMale;
          $user->surname = $faker->lastName;
          $user->date_of_birth = $faker->date($format = 'Y-m-d', $max = 'now');
          $user->phone = $faker->e164PhoneNumber;
          $user->email = $faker->email;
          $user->password = bcrypt('secret');
          $user->address = $faker->streetAddress;
          $user->city = $faker->city;
          $user->zip = $faker->postcode;
          $user->country_id = $faker->numberBetween($min = 31, $max = 32);
          $user->save();
        }

    }
}
