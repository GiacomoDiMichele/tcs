<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 2; $i++) {
            $new_activity = new Activity();
            $new_activity->code_activity = $faker->regexify('[A-Z]{5}[0-7]{4}');
            $new_activity->name = $faker->name();
            $new_activity->description = $faker->text(100);
            $new_activity->start_date = $faker->date();
            $new_activity->end_date = $faker->date();
            $new_activity->is_active = $faker->boolean();
            $new_activity->save();
        }
    }
}
