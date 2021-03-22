<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin',]);

        /* gerando dados pelo ID */
        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);

        $role = Role::create(['name' => 'Instrutor',]);

        /* gerando dados pelo NAME */
        $role->syncPermissions(['Criar Cursos','Acessar Lista de Cursos', 'Atualizar Cursos']);
    }
}
