<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\Admin\DatospersonalsController;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Sector;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Ejecutora;


use function PHPUnit\Framework\callback;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(DepartamentoSeeder::class);
    $this->call(ProvinciaSeeder::class);
    $this->call(EjecutoraSeeder::class);
    $this->call(DistritoSeeder::class);
    $this->call(SectorSeeder::class);
   
    $this->call(DatospersonalSeeder::class);
    $this->call(CapacitacionSeeder::class);
    $this->call(EventoSeeder::class);
    
    }
}
