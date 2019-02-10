<?php

use Illuminate\Database\Seeder;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker=\Faker\Factory::create();
        foreach (range(1,120) as $item){
            \App\Student::create([
                'fname'=>$faker->name(),
                'room_id' =>$faker->numberBetween(1,20),
                'mother' =>$faker->name(['gender'=>'female']),
                'father' =>$faker->name(['male' => 'male']),
                'contact' =>$faker->phoneNumber,
                'address' =>$faker->address,
            ]);
        }
    }
}
