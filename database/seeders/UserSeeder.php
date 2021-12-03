<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = '$2y$10$YQBgGnFqoNGkTR9Bi9hDAe1uFq.zLCOT2bMHjiWN/hLg/mvwYMtaG'; //665379411
        $user->idCategoriaFK = 1;

        $user->save();
        
    }
}
