<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus;
use App\Models\Line;
use App\Models\Station;
use App\Models\Schedule;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
               // Create 10 bus records
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Bus::create([
                'brand' => $faker->company(),
                'purchase_date' => $faker->date(),
                'passenger_capacity' => $faker->numberBetween(20, 100),
            ]);
        }

        // Create 10 station records
        for ($i = 0; $i < 10; $i++) {
            Station::create([
                'code' => $faker->unique()->regexify('[A-Za-z0-9]{5}'),
                'name' => $faker->city(),
                'address' => $faker->address(),
            ]);
        }

        // Create 20 line records
        $stations = Station::all();
        for ($i = 0; $i < 20; $i++) {
            $start_station = $stations->random();
            $end_station = $stations->random();
            while ($start_station->id == $end_station->id) {
                $end_station = $stations->random();
            }
            Line::create([
                'bus_id' => Bus::all()->random()->id,
                'code' => $faker->unique()->regexify('[A-Za-z0-9]{5}'),
                'start_station_id' => $start_station->id,
                'end_station_id' => $end_station->id,
                'departure_time' => $faker->time(),
                'arrival_time' => $faker->time(),
                'distance_km' => $faker->numberBetween(50, 1000),
            ]);
        }

        // Create 50 schedule records
        $lines = Line::all();
        for ($i = 0; $i < 50; $i++) {
            $line = $lines->random();
            Schedule::create([
                'line_id' => $line->id,
                'station_id' => $line->start_station_id,
                'direction' => 'departure',
                'arrival_time' => $faker->time(),
                'departure_time' => $faker->time(),
            ]);
            Schedule::create([
                'line_id' => $line->id,
                'station_id' => $line->end_station_id,
                'direction' => 'arrival',
                'arrival_time' => $faker->time(),
                'departure_time' => $faker->time(),
            ]);
        }
    }
}
