<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pack;

class PacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packs = new Pack();

        $packs->nomPack = 'Álbum Digital 30x30 20 lienzos';
        $packs->precioPack = '1100';
        $packs->descripcion = 'Álbum Digital 30x30 de 20 lienzos.';
        $packs->vigente = 'SI';

        $packs->save();

        $packs2 = new Pack();

        $packs2->nomPack = 'Álbum Digital 30x30 30 lienzos';
        $packs2->precioPack = '1300';
        $packs2->descripcion = 'Álbum Digital 30x30 de 30 lienzos.';
        $packs2->vigente = 'SI';

        $packs2->save();
    }
}
