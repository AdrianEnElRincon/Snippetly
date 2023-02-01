<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('role_id', '=', roles()->id('admin'))->first();

        foreach(Community::all() as $community)
        {
            Subscription::create([
                'user_id' => $admin->id,
                'community_id' => $community->id,
                'owner' => true,
            ]);
        }

        $communities = Community::all();

        foreach(User::all() as $user)
        {
            Subscription::create([
                'user_id' => $user->id,
                'community_id' => $communities->random()->id,
            ]);
        }
    }
}
