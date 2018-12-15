<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
        	'nombres' => 'camilo andres gomez vergara', 
        	'direccion' => 'Carrera 15 #9a 2-15',
        	'user_id' => '1'
        ]);
    }
}
