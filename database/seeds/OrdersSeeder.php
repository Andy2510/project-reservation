<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
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
        $order = new User;
        $order->name = $faker->firstNameMale;
        $order->surname = $faker->lastName;
        $order->date_of_birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $order->phone = $faker->e164PhoneNumber;
        $order->email = $faker->email;
        $order->password = bcrypt('secret');
        $order->address = $faker->streetAddress;
        $order->city = $faker->city;
        $order->zip = $faker->postcode;
        $order->country_id = $faker->numberBetween($min = 31, $max = 32);
        $order->is_admin = $faker->boolean;
        $order->save();
      }
    }
}
