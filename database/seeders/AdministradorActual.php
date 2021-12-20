<?php

namespace Database\Seeders;

use App\Models\administrador_creditos;
use Illuminate\Database\Seeder;

class AdministradorActual extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        administrador_creditos::create(['administrador'=>'Lic.Fabiola Catalina Ramírez Valadez']);
    }
}
