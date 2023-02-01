<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Snippet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Snippet::all() as $snippet)
        {
            for ($i = 0; $i < random_int(10, 20); $i++) {
                Comment::factory()->create([
                    'snippet_id' => $snippet->id,
                    'user_id' => User::all()->random()->id
                ]);
            }

        }


    }
}
