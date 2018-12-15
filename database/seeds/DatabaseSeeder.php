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
        $this->call(CategoriaTableSeeder::class);
        $this->call(SubCategoriaTableSeeder::class);
        $this->call(Cat_x_SubCatTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PuntosTableSeeder::class);
        $this->call(PersonasTableSeeder::class);
        $this->call(CantidadesTableSeeder::class);
    }
}
