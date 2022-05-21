<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoCliente();
        $tipo->tipo = "Natural";
        $tipo->save();
        $tipo = new TipoCliente();
        $tipo->tipo = "Empresarial";
        $tipo->save();
        $tipo = new TipoCliente();
        $tipo->tipo = "Otro";
        $tipo->save();
    }
}
