<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Billetera',
            'talla' => 'S',
            'observaciones' => 'Ninguna',
            'id_marca' => 1,
            'cantidadInventario' => 10,
            'fechaEmbarque' => '2022/10/10',
        ]);
    }
}
