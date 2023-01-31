<?php

namespace Database\Seeders;

use App\Enums\Roles;
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
        $admin = Roles::Admin->value;

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@snippely.com',
            'role_id' => roles()->id('admin'),
            'public' => false
        ]);

        User::factory(100)->create();
    }
}
