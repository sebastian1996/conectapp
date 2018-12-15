<?php

use Illuminate\Database\Seeder;

class Cat_x_CanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = ['4', '4', '4', '4', '5', '5'];
    private $second_data = ['1', '2', '3', '4', '1', '2'];

    public function run()
    {
        for ($i = 0; $i < count($this->data); $i++ ){
            DB::table('cat_x_can')->insert(['categoria_id' => $this->data[$i], 'subcategoria_id' => $this->second_data[$i]]);
        }
    }
}
