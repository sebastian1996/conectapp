<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'camilo@gmail.com',
            'password' => bcrypt('12345'),
            'estado' => true
        ]);
        
        DB::table('users')->insert([
            'email' => 'recolectores@gmail.com',
            'password' => bcrypt('12345'),
            'estado' => true
        ]);
    }
}
