<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Departamento::insert([
            ['id'=>1,'name'=>'AMAZONAS'],
            ['id'=>2,'name'=>'ÁNCASH'],
            ['id'=>3,'name'=>'APURIMAC'],
            ['id'=>4,'name'=>'AREQUIPA'],
            ['id'=>5,'name'=>'AYACUCHO'],
            ['id'=>6,'name'=>'CAJAMARCA'],
            ['id'=>7,'name'=>'CUSCO'],
            ['id'=>8,'name'=>'HUANCAVELICA'],
            ['id'=>9,'name'=>'HÚANUCO'],
            ['id'=>10,'name'=>'ICA'],
            ['id'=>11,'name'=>'JUNÍN'],
            ['id'=>12,'name'=>'LA LIBERTAD'],
            ['id'=>13,'name'=>'LAMBAYAQUE'],
            ['id'=>14,'name'=>'LIMA'],
            ['id'=>15,'name'=>'LORETO'],
            ['id'=>16,'name'=>'MADRE DE DIOS'],
            ['id'=>17,'name'=>'MOQUEGUA'],
            ['id'=>18,'name'=>'PASCO'],
            ['id'=>19,'name'=>'PIURA'],
            ['id'=>20,'name'=>'PUNO'],
            ['id'=>21,'name'=>'SAN MARTÍN'],
            ['id'=>22,'name'=>'TACNA'],
            ['id'=>23,'name'=>'TUMBES'],
            ['id'=>24,'name'=>'UCAYALI'],
            ['id'=>25,'name'=>'CALLAO'],
            
        ]);
        //
        // Departamento::create([
        //     'name'=> 'Amazonas',
        // ]);
        // Departamento::create([
        //     'name'=> 'Áncash',
        // ]);
        // Departamento::create([
        //     'name'=> 'Apurimac',
        // ]);
        // Departamento::create([
        //     'name'=> 'Arequipa',
        // ]);
        // Departamento::create([
        //     'name'=> 'Ayacucho',
        // ]);
        // Departamento::create([
        //     'name'=> 'Cajamarca',
        // ]);
        // Departamento::create([
        //     'name'=> 'Cusco',
        // ]);
        // Departamento::create([
        //     'name'=> 'Huancavelica',
        // ]);
        // Departamento::create([
        //     'name'=> 'Húanuco',
        // ]);
        // Departamento::create([
        //     'name'=> 'Ica',
        // ]);
        // Departamento::create([
        //     'name'=> 'Junín',
        // ]);
        // Departamento::create([
        //     'name'=> 'La Libertad',
        // ]);
        // Departamento::create([
        //     'name'=> 'Lambayeque',
        // ]);
        // Departamento::create([
        //     'name'=> 'Lima',
        // ]);
        // Departamento::create([
        //     'name'=> 'Loreto',
        // ]);
        // Departamento::create([
        //     'name'=> 'Madre de Dios',
        // ]);
        // Departamento::create([
        //     'name'=> 'Moquegua',
        // ]);
        // Departamento::create([
        //     'name'=> 'Pasco',
        // ]);
        // Departamento::create([
        //     'name'=> 'Piura',
        // ]);
        // Departamento::create([
        //     'name'=> 'Puno',
        // ]);
        // Departamento::create([
        //     'name'=> 'San Martin',
        // ]);
        // Departamento::create([
        //     'name'=> 'Tacna',
        // ]);
        // Departamento::create([
        //     'name'=> 'Tumbes',
        // ]);
        // Departamento::create([
        //     'name'=> 'Ucayali',
        // ]);
    }
}
