<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Evento::create([
            'name'=>'Banderolazo',
            'fecha'=>'2025-04-12',
            'detalle'=>'participaran 100 personas en la plaza de la capital de departamento y caminata',
            'codigo_evento'=>'evento_1',
            'departamento_id'=>'14',
            'provincia_id'=>'128',
            
        ]);
    }
}
