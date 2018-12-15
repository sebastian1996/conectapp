<?php

use Illuminate\Database\Seeder;

class CantidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = ['Kilogramos'];

    public function run()
    {
        for ($i = 0; $i < count($this->data); $i++ ){
            DB::table('cantidades')->insert(['nombre' => $this->data[$i]]);
        }
    }
}
