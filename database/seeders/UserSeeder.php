<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                    'name' => 'Anderson Nascimento Calheiros Rocha',
                    'email' => 'anderson.rocha@ancora-ti.com.br',
                    'password' => bcrypt('cursos@020702'),
                ]);

        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}
