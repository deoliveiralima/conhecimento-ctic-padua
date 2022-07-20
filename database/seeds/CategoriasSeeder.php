<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = ["AP - Ubiquiti",
        "Cameras",
        "Controlador de Domínio",
        "Docker e kubernetes",
        "Manutenção",
        "PFsense",
        "Softwares utilitários",
        "Suap",
        "Switchs",
        "Windows",
        "Zabix",
        "Outros",
         ];
        foreach($categorias as $categoria){
            DB::table('categorias')->insert([
                'nome' => $categoria,
            ]);
        }
        
        //
    }
}
