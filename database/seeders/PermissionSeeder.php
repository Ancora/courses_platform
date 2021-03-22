<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Criar Cursos',
        ]);

        Permission::create([
            'name' => 'Acessar Lista de Cursos',
        ]);

        Permission::create([
            'name' => 'Atualizar Cursos',
        ]);

        Permission::create([
            'name' => 'Excluir Cursos',
        ]);

        Permission::create([
            'name' => 'Acessar Dashboard',
        ]);

        Permission::create([
            'name' => 'Criar Funções',
        ]);

        Permission::create([
            'name' => 'Acessar Lista de Funções',
        ]);

        Permission::create([
            'name' => 'Atualizar Funções',
        ]);

        Permission::create([
            'name' => 'Excluir Funções',
        ]);

        Permission::create([
            'name' => 'Acessar Lista de Usuários',
        ]);

        Permission::create([
            'name' => 'Atualizar Usuários',
        ]);
    }
}
