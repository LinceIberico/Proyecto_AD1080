<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promocion;

class PromocionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promo = new Promocion();

        $promo->nomPromo = 'Sin Descuentos';        
        $promo->descuento = '0';
        $promo->descripcion = 'Sin descuentos.';
        $promo->vigente = 'SI';

        $promo->save();

        $promo1 = new Promocion();

        $promo1->nomPromo = 'Pronto Pago';        
        $promo1->descuento = '10';
        $promo1->descripcion = 'Si se hace un pago adelantado y se finaliza en el mes de la boda.';
        $promo1->vigente = 'SI';

        $promo1->save();
       
    }
}