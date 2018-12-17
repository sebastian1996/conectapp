<?php

use Illuminate\Database\Seeder;

class Cat_x_PunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = ['1', '2', '3'];

    public function run()
    {
        for ($i = 0; $i < count($this->data); $i++ ){
            DB::table('cat_x_pun')->insert(['categoria_id' => $this->data[$i], 'cantidad_id' => '1', 'punto_id' => '1']);
        }
    }
}
