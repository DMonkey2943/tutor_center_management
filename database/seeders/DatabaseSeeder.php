<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UsersTableSeeder::class,
            DistrictsTableSeeder::class,
            WardsTableSeeder::class,
            LevelsTableSeeder::class,
            SubjectsTableSeeder::class,
            GradesTableSeeder::class,
            TuitionsTableSeeder::class
        ]);

        // $this->call(DistrictsTableSeeder::class);
        // $this->call(WardsTableSeeder::class);
        // $this->call(LevelsTableSeeder::class);
        // $this->call(SubjectsTableSeeder::class);
        // $this->call(GradesTableSeeder::class);
        // $this->call(TuitionsTableSeeder::class);
    }
}