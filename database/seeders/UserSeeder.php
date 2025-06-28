<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([//1
            'DNI'=>'44475754',
            'name'=>'Ricardo',
            'apellido_paterno'=>'Rojas',
            'apellido_materno'=>'Eusebio',
            'email'=>'ricardo@batallaperu.com',
            'celular'=>'998884754',
            'password'=>bcrypt('44475754'),
        ]);//2
        User::create([
            'DNI'=>'14001400',
            'name'=>'CEN',
            'apellido_paterno'=>'Batalla',
            'apellido_materno'=>'Perú',
            'email'=>'CEN@batallaperu.com',
            'celular'=>'991400140',
            'password'=>bcrypt('14001400'),
        ]);//3
        User::create([
            'DNI'=>'11001100',
            'name'=>'Coordinador de todas las Regionales',
            'apellido_paterno'=>'Todas',
            'apellido_materno'=>'Las Regiones',
            'email'=>'Coordinadortodasregional@batallaperu.com',
            'celular'=>'991100110',
            'password'=>bcrypt('11001100'),
        ]);//4
        User::create([
            'DNI'=>'11001101',
            'name'=>'Coordinador Junin',
            'apellido_paterno'=>'Departamento',
            'apellido_materno'=>'Junín',
            'email'=>'coordinadorjunin@batallaperu.com',
            'celular'=>'991030103',
            'password'=>bcrypt('12345678'),
        ]);//5
        User::create([
            'DNI'=>'04000001',
            'name'=>'Coordinador Huancayo',
            'apellido_paterno'=>'Huancayo',
            'apellido_materno'=>'Huancayo',
            'email'=>'huancayo@batallaperu.com',
            'celular'=>'991078107',
            'password'=>bcrypt('12345678'),
        ]);//6
        User::create([
            'DNI'=>'04000002',
            'name'=>'coodinador chupaca',
            'apellido_paterno'=>'chupaca',
            'apellido_materno'=>'chupaca',
            'email'=>'chupaca@batallaperu.com',
            'celular'=>'990100001',
            'password'=>bcrypt('12345678'),
        ]);//7
        User::create([
            'DNI'=>'04000003',
            'name'=>'coordinador concepcion',
            'apellido_paterno'=>'concepcion',
            'apellido_materno'=>'concepcion',
            'email'=>'concepcion@batallaperu.com',
            'celular'=>'990100000',
            'password'=>bcrypt('12345678'),
        ]);//8
        User::create([
            'DNI'=>'05010001',
            'name'=>'coordinador pilcomayo',
            'apellido_paterno'=>'pilcomayo',
            'apellido_materno'=>'pilcomayo',
            'email'=>'pilcomayo@batallaperu.com',
            'celular'=>'990101000',
            'password'=>bcrypt('12345678'),
        ]);//9
        User::create([
            'DNI'=>'05000002',
            'name'=>'Coordinador el tambo',
            'apellido_paterno'=>'el tambo',
            'apellido_materno'=>'el tambo',
            'email'=>'tambo@batallaperu.com',
            'celular'=>'999101010',
            'password'=>bcrypt('12345678'),
        ]);//10
        User::create([
            'DNI'=>'06000001',
            'name'=>'comando 1',
            'apellido_paterno'=>'comando',
            'apellido_materno'=>'batalla',
            'email'=>'comando1@batallaperu.com',
            'celular'=>'990101001',
            'password'=>bcrypt('12345678'),
        ]);//11
        User::create([
            'DNI'=>'06000002',
            'name'=>'comando 2',
            'apellido_paterno'=>'comando 2',
            'apellido_materno'=>'batalla 2',
            'email'=>'comando2@batallaperu.com',
            'celular'=>'990101002',
            'password'=>bcrypt('12345678'),
        ]);//12
        User::create([
            'DNI'=>'06000003',
            'name'=>'comando 3',
            'apellido_paterno'=>'comando 3',
            'apellido_materno'=>'batalla 3',
            'email'=>'comando3@batallaperu.com',
            'celular'=>'990101003',
            'password'=>bcrypt('12345678'),
        ]);//13
        User::create([
            'DNI'=>'07000001',
            'name'=>'Militante1',
            'apellido_paterno'=>'militante1',
            'apellido_materno'=>'batalla',
            'email'=>'militante1@batallaperu.com',
            'celular'=>'990101004',
            'password'=>bcrypt('12345678'),
        ]);//14
        User::create([
            'DNI'=>'07000002',
            'name'=>'Militante2',
            'apellido_paterno'=>'militante2',
            'apellido_materno'=>'batalla',
            'email'=>'militante2@batallaperu.com',
            'celular'=>'990101005',
            'password'=>bcrypt('12345678'),
        ]);//15
        User::create([
            'DNI'=>'07000003',
            'name'=>'Militante3',
            'apellido_paterno'=>'militante3',
            'apellido_materno'=>'batalla',
            'email'=>'militante3@batallaperu.com',
            'celular'=>'990101006',
            'password'=>bcrypt('12345678'),
        ]);//16
        // User::create([
        //     'DNI'=>'10010007',
        //     'name'=>'Militante7',
        //     'apellido_paterno'=>'militante7',
        //     'apellido_materno'=>'batalla',
        //     'email'=>'cmilitante7@batallaperu.com',
        //     'celular'=>'990101007',
        //     'password'=>bcrypt('12345678'),
        // ]);//17
        // User::create([
        //     'DNI'=>'10010008',
        //     'name'=>'Militante8',
        //     'apellido_paterno'=>'militante8',
        //     'apellido_materno'=>'batalla',
        //     'email'=>'cmilitante8@batallaperu.com',
        //     'celular'=>'990101008',
        //     'password'=>bcrypt('12345678'),
        // ]);//18
        // User::create([
        //     'DNI'=>'10010009',
        //     'name'=>'Militante9',
        //     'apellido_paterno'=>'militante9',
        //     'apellido_materno'=>'batalla',
        //     'email'=>'cmilitante9@batallaperu.com',
        //     'celular'=>'990101009',
        //     'password'=>bcrypt('12345678'),
        // ]);//19
        // User::create([
        //     'DNI'=>'10010010',
        //     'name'=>'Militante10',
        //     'apellido_paterno'=>'militante10',
        //     'apellido_materno'=>'batalla',
        //     'email'=>'cmilitante10@batallaperu.com',
        //     'celular'=>'990101010',
        //     'password'=>bcrypt('12345678'),
        // ]);
    }
}
