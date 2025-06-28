<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1=Role::create(['name'=>'desarrollador']);
        $role2=Role::create(['name'=>'CEN']);
        $role3=Role::create(['name'=>'Candidatos']);
        $role4=Role::create(['name'=>'Coordinador_Regiones']);
        $role5=Role::create(['name'=>'Coordinador_Provincias']);
        $role6=Role::create(['name'=>'Coordinador_Distritales']);
        $role7=Role::create(['name'=>'coordinador_Comandos']);
        $role8=Role::create(['name'=>'militante']);//no utilizar


        Permission::create(['name'=>'admin.home'])->syncRoles([$role1]);//cargado 1

        //user
        Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);//cargado 2 vista
        Permission::create(['name'=>'admin.users.create'])->syncRoles([$role1]);//cargado 2 crear
        Permission::create(['name'=>'admin.users.store'])->syncRoles([$role1]);//cargado 2 crear
        Permission::create(['name'=>'admin.users.edit'])->syncRoles([$role1,$role7,$role6,$role5,$role4,$role2]);//cargado 2 editar
        Permission::create(['name'=>'admin.users.update'])->syncRoles([$role1,$role7,$role6,$role5,$role4,$role2]);//cargado 2 editar
        Permission::create(['name'=>'admin.users.show'])->syncRoles([$role1]);//cargado 2
        Permission::create(['name'=>'admin.users.destroy'])->syncRoles([$role1]);//cargado 2 eliminar
        Permission::create(['name'=>'admin.users.nacional.index'])->syncRoles([$role1,$role2]);//cargado 3
        Permission::create(['name'=>'admin.users.regional.index'])->syncRoles([$role1,$role4]);//cargado 4
        Permission::create(['name'=>'admin.users.provincial.index'])->syncRoles([$role1,$role5]);//cargado 5
        Permission::create(['name'=>'admin.users.distrital.index'])->syncRoles([$role1,$role6]);//cargado 6

        //datospersonal
        Permission::create(['name'=>'admin.datospersonals.index'])->syncRoles([$role1,$role2,$role3]);//cargado 7 vista
        Permission::create(['name'=>'admin.datospersonals.create'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 7 crear
        Permission::create(['name'=>'admin.datospersonals.store'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 7 crear
        Permission::create(['name'=>'admin.datospersonals.edit'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 7 editar
        Permission::create(['name'=>'admin.datospersonals.update'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 7 editar
        Permission::create(['name'=>'admin.datospersonals.show'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 7
        Permission::create(['name'=>'admin.datospersonals.destroy'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 7 eliminar
        Permission::create(['name'=>'admin.datospersonals.departamento.index'])->syncRoles([$role1,$role4]);//cargado 8
        Permission::create(['name'=>'admin.datospersonals.provincia.index'])->syncRoles([$role1,$role5]);//cargado 9
        Permission::create(['name'=>'admin.datospersonals.distrito.index'])->syncRoles([$role1,$role6]);//cargado 10
        Permission::create(['name'=>'admin.dato'])->syncRoles([$role1]);//todos los que ingresan cargado 11

        //redes sociales
        Permission::create(['name'=>'admin.socialnetworks.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role7]);//cargado 12
        Permission::create(['name'=>'admin.socialnetworks.store'])->syncRoles([$role1]);//cargado 12
        Permission::create(['name'=>'admin.socialnetworks.create'])->syncRoles([$role1]);//cargado 12
        Permission::create(['name'=>'admin.socialnetworks.show'])->syncRoles([$role1]);//cargado 12
        Permission::create(['name'=>'admin.socialnetworks.update'])->syncRoles([$role1]);//cargado 12
        Permission::create(['name'=>'admin.socialnetworks.destroy'])->syncRoles([$role1]);//cargado 12
        Permission::create(['name'=>'admin.socialnetworks.edit'])->syncRoles([$role1]);//cargado 12

        //COMANDOS;el CEN solo puede crear y ver general index - Candidato solo puede ver comando- 
        Permission::create(['name'=>'admin.ejecutoras.index'])->syncRoles([$role1,$role2,]);//cargado 13 vista nacional *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.create'])->syncRoles([$role1,$role2,$role4,$role5,$role6]);//cargado 13 crear nacional y ver comandos  *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.store'])->syncRoles([$role1,$role2,$role4,$role5,$role6]);//cargado 13 crear nacional y ver comandos *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.edit'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 13 editar nacional y ver comandos *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.update'])->syncRoles([$role1,$role4,$role5,$role6]);//cargado 13 editar nacional y ver comandos *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.show'])->syncRoles([$role1,$role2]);//cargado 13  *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.destroy'])->syncRoles([$role1]);//cargado 13 eliminar nacional y ver comandos *****nacional*******
        Permission::create(['name'=>'admin.ejecutoras.vercomando.index'])->syncRoles([$role1,$role3,$role4,$role5,$role6]);//cargado 14 vista ver comandos ********ver comando por el que registra*****
        
        //capacitaciones
        Permission::create(['name'=>'admin.capacitaciones.index'])->syncRoles([$role1]);//cargar 15 vista
        Permission::create(['name'=>'admin.capacitaciones.create'])->syncRoles([$role1,$role2,$role3,$role4]);//cargar 15 crear
        Permission::create(['name'=>'admin.capacitaciones.store'])->syncRoles([$role1,$role2,$role3,$role4]);//cargar 15 crear
        Permission::create(['name'=>'admin.capacitaciones.edit'])->syncRoles([$role1,$role2,$role3,$role4]);//cargar 15 editar
        Permission::create(['name'=>'admin.capacitaciones.update'])->syncRoles([$role1,$role2,$role3,$role4]);//cargar 15 editar
        Permission::create(['name'=>'admin.capacitaciones.show'])->syncRoles([$role1,$role2,$role3,$role4]);//cargar 15
        Permission::create(['name'=>'admin.capacitaciones.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);//cargar 15 eliminar
        
        //eventos
        Permission::create(['name'=>'admin.eventos.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role7]);//cargardo 16 vista
        Permission::create(['name'=>'admin.eventos.create'])->syncRoles([$role1,$role4]);//cargardo 16 crear
        Permission::create(['name'=>'admin.eventos.store'])->syncRoles([$role1,$role4]);//cargardo 16 crear
        Permission::create(['name'=>'admin.eventos.show'])->syncRoles([$role1,$role4]);//cargardo 16
        Permission::create(['name'=>'admin.eventos.edit'])->syncRoles([$role1,$role4]);//cargardo 16 editar
        Permission::create(['name'=>'admin.eventos.update'])->syncRoles([$role1,$role4]);//cargardo 16 actualizar
        Permission::create(['name'=>'admin.eventos.destroy'])->syncRoles([$role1,$role4]);//cargardo 16 eliminar

        //actividad
        Permission::create(['name'=>'admin.actividads.index'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 vista
        Permission::create(['name'=>'admin.actividads.create'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 crear
        Permission::create(['name'=>'admin.actividads.store'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 guardar
        Permission::create(['name'=>'admin.actividads.edit'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 editar
        Permission::create(['name'=>'admin.actividads.update'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 actualizar
        Permission::create(['name'=>'admin.actividads.show'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 
        Permission::create(['name'=>'admin.actividads.destroy'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 17 eliminar
        Permission::create(['name'=>'admin.actividads.carga'])->syncRoles([$role1,$role2,$role4,$role5,$role6,$role7]);//cargar 18
        Permission::create(['name'=>'admin.actividads.evaluacionprogramador.index'])->syncRoles([$role1]);//cargar 19
        
        

        Permission::create(['name'=>'admin.estadisticas.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6]);//cargar 20 vista
        Permission::create(['name'=>'admin.estadisticas.create'])->syncRoles([$role1]);//cargar 20 crear
        Permission::create(['name'=>'admin.estadisticas.store'])->syncRoles([$role1]);//cargar 20 guardar
        Permission::create(['name'=>'admin.estadisticas.edit'])->syncRoles([$role1]);//cargar 20 editar
        Permission::create(['name'=>'admin.estadisticas.update'])->syncRoles([$role1]);//cargar 20 actualizar
        Permission::create(['name'=>'admin.estadisticas.show'])->syncRoles([$role1]);//cargar 20
        Permission::create(['name'=>'admin.estadisticas.destroy'])->syncRoles([$role1]);//cargar 20 eliminar
        


    }
}
