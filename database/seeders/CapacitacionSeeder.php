<?php

namespace Database\Seeders;

use App\Models\Capacitaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapacitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Capacitaciones::create([
            'tema'=>'Dunción de la ONPE',
            'Alcance'=>'Público',
            'enlace'=>'https://www.youtube.com/watch?v=41dFS9sQCPM',
            'fecha'=>'2025-04-11',
            'descripción'=>'conocer los terminos',
        ]);
    }
}
