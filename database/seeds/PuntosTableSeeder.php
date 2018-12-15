<?php

use Illuminate\Database\Seeder;

class PuntosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puntos')->insert([
        	'nombre' => 'Reciclamos S.A', 
        	'NIT' => '1008493728832',
        	'direccion' => 'Carrera 12 #9 2-70',
            'user_id' => '2'
        ]);
    }
}
