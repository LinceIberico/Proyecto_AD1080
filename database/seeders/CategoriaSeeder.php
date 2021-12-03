<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();

        $categoria->categoria = 'Administrador';
        $categoria->save();

        $categoria2 = new Categoria();

        $categoria2->categoria = 'Empleado';
        $categoria2->save();

        $categoria3 = new Categoria();

        $categoria3->categoria = 'Cliente';
        $categoria3->save();
    }
}
