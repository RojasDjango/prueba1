<?php

namespace Database\Seeders;

use App\Models\Ejecutora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EjecutoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Ejecutora::create([
            'name'=>'Programador',
            'user_id'=>'1',
            'nivel'=>'Desarrollador',
            'DNI'=>'44475754',

        ]);//2
        Ejecutora::create([
            'name'=>'Comando CEN',
            'user_id'=>'2',
            'nivel'=>'Nacional',
            'DNI'=>'14001400',
            'created_by'=>'1',

        ]);
        //3 nivel nacional
        Ejecutora::create([
            'name'=>'Coordinador de las Regiones',
            'user_id'=>'3',
            'nivel'=>'Nacional',
            'DNI'=>'11001100',
            'created_by'=>'2'

        ]);
        //4 nivel 
        Ejecutora::create([
            'name'=>'Coordinador de junin',
            'user_id'=>'4',
            'nivel'=>'Regional',
            'DNI'=>'11001101',
            'created_by'=>'3',

        ]);
        //5 nivel
        Ejecutora::create([
            'name'=>'Coordinador de huancayo',
            'user_id'=>'5',
            'nivel'=>'Provincia',
            'DNI'=>'04000001',
            'created_by'=>'4',

        ]);
        //6 nivel 
        Ejecutora::create([
            'name'=>'coordinador de pilcomayo',
            'user_id'=>'8',
            'nivel'=>'Distrital',
            'DNI'=>'05000001',
            'created_by'=>'5',

        ]);// 7
        Ejecutora::create([
            'name'=>'Comando batalla',
            'user_id'=>'10',
            'nivel'=>'Distrital',
            'DNI'=>'06000001',
            'created_by'=>'6',
        ]);
        // Ejecutora::create([
        //     'name'=>'Comando Distrital',
        //     'user_id'=>'8',
        //     'nivel'=>'Comando',
        //     'DNI'=>'01010001',

        // ]);
        

        // Ejecutora::create([
        //     'name'=>'Comando Regional',
        //     'user_id'=>'1',
        //     'nivel'=>'Nacional',
        //     'DNI'=>'11001100',
        // ]);
        // Ejecutora::create([
        //     'name'=>'AGRICULTURA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'TRANSPORTES',
        // ]);
        // Ejecutora::create([
        //     'name'=>'REGION JUNIN-EDUCACION',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION TARMA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION SATIPO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION CHANCHAMAYO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION HUANCAYO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION CONCEPCION',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION CHUPACA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION JAUJAA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION YAULI- LA OROYA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION PROVINCIA DE JUNIN',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION PICHANAKI',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION PANGOA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION RIO TAMBO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EDUCACION RIO ENE MANTARO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'DIRESA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'DANIEL ALCIDES CARRION',
        // ]);
        // Ejecutora::create([
        //     'name'=>'EL CARMEN',
        // ]);
        // Ejecutora::create([
        //     'name'=>'SALUD JAUJA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'SALUD TARMA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'SALUD CHANCHAMAYO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'SALUD SATIPO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'SALUD JUNÍN',
        // ]);
        // Ejecutora::create([
        //     'name'=>'RSVM',
        // ]);
        // Ejecutora::create([
        //     'name'=>'RED DE SALUD PICHANAKI',
        // ]);
        // Ejecutora::create([
        //     'name'=>'RED DE SALUD SAN MARTIN DE PANGOA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'SALUD CHUPACA',
        // ]);
        // Ejecutora::create([
        //     'name'=>'JULIO CESAR DEMARINI CARO',
        // ]);
        // Ejecutora::create([
        //     'name'=>'IREN CENTRO',
        // ]);
    }
    
}
