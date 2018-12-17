<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = ['Papel', 'Cartón', 'Vidrio', 'Metal/Cobre', 'Metal/Chatarra', 'Metal/Hierro', 'Metal/Aluminio', 'Plástico/PET', 'Plástico/Otros','Muebles', 'Electrodomésticos', 'Ropa y Calzado'];
    
    public function run()
    {
        for ($i = 0; $i < count($this->data); $i++ ){
            DB::table('categorias')->insert(['nombre' => $this->data[$i]]);
        }
    }
}
