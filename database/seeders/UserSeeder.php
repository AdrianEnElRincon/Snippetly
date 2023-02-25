<?php

namespace Database\Seeders;

use App\Models\Profile;
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

        $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@snippetly.com',
            'role_id' => roles()->id('admin'),
        ]);

        Profile::factory()->create([
            'user_id' => $admin->id,
            'public' => false
        ]);

        User::factory(50)->create();

        foreach(User::all() as $user)
        {
            if ($user->id === $admin->id) continue;

            Profile::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}
