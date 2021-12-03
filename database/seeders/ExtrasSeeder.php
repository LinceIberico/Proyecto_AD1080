<?php

namespace Database\Seeders;

use App\Models\Extra;
use Illuminate\Database\Seeder;

class ExtrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extra0 = new Extra();

        $extra0->nomExtra = 'Sin Extras';
        $extra0->precioExtra = '0';
        $extra0->descripcion = 'Sin Extras.';
        $extra0->vigente = 'SI';

        $extra0->save();


        $extra1 = new Extra();

        $extra1->nomExtra = 'Vídeo FULL-HD Completo';
        $extra1->precioExtra = '700';
        $extra1->descripcion = 'Grabación completa de la boda hasta una hora después de la barra libre.';
        $extra1->vigente = 'SI';

        $extra1->save();

        $extra2 = new Extra();

        $extra2->nomExtra = 'SDE';
        $extra2->precioExtra = '150';
        $extra2->descripcion = 'Edición y visionado del evento en el mismo día.';
        $extra2->vigente = 'SI';

        $extra2->save();

        $extra3 = new Extra();

        $extra3->nomExtra = 'Dron';
        $extra3->precioExtra = '200';
        $extra3->descripcion = 'Uso de dron en exteriores.';
        $extra3->vigente = 'SI';

        $extra3->save();
    }
}
