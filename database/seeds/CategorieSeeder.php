<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Music & Movies',
            'Arts',
            'Tournament',
            'Charities',
            'Parties & Nightlife',
            'Tour',
            'Fashion',
            'Sports & Active Life',
            'Seminar or Talk',
            'Screening',
            'Rally',
            'Race or Endurance Event',
            'Party or Social Gathering',
            'Meeting or Networking Event',
            'Festival or Fair',
            'Dinner or Gala',
            'Convention',
            'Conference',
            'Concert or Performance',
            'Class, Training, or Workshop',
            'Camp, Trip, or Retreat',
            'Attraction',
            'Appearance or Signing',
            'Other',
        ];

        for ($i = 0; $i < count($categories); $i++)
        {
            DB::table('categories')->insert([
                'name' => $categories[$i],
                'slug' => str_slug($categories[$i]),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
