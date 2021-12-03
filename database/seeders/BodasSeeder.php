<?php

namespace Database\Seeders;

use App\Models\Boda;
use Illuminate\Database\Seeder;

class BodasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boda = new Boda();

        $boda->nomBoda = 'Cristina & Gabriel';
        $boda->fechaBoda = '2021-09-11';
        $boda->horaBoda = '12:30:00';
        $boda->nomNovio = 'Gabriel Rufian';
        $boda->nomNovia = 'Cristina Cifuentes';
        $boda->dirNovio = 'calle Barcelona, 35';
        $boda->dirNovia = 'calle Madrid, 54';
        $boda->tlfNovio = '662123458';
        $boda->tlfNovia = '745123879';
        $boda->emailNovio = 'rufianRojo@gmail.com';
        $boda->emailNovia = 'cifuentes@gmail.com';
        $boda->ceremonia = 'Iglesia de la O';
        $boda->celebracion = 'Hacienda Arabesca';
        $boda->descripcion = 'Habrá regalos al finalizar el corte de la tarta.';

        $boda->save();
    }
}
