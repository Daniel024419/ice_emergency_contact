<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users =  User::factory(10)->create();

        foreach ($users as $key => $user) {
            Posts::factory(4)->create(
                [
                    'userId' => $user->id,
                ]
            );
       
        }

        $posts = Posts::all();
        foreach ($posts as $key => $post) {
                Comments::factory(rand(1, 4))->create(
                [
                    'userId' => User::all()->random()->id,
                    'postId' => $post->id
                ]
            );
        }
    }
}
