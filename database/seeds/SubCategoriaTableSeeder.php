<?php

use Illuminate\Database\Seeder;

class SubCategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = ['Cobre', 'Chatarra', 'Hierro', 'Aluminio', 'PET', 'Otro'];

    public function run()
    {
        for ($i = 0; $i < count($this->data); $i++ ){
            DB::table('subcategorias')->insert(['nombre' => $this->data[$i]]);
        }
    }
}
