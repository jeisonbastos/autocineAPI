<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ClassificationSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(ShowSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductClassificationSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TicketTypeSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
