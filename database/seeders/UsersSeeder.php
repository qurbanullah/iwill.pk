<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserSkill;
use App\Models\User;
use App\Models\Post;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 100 users with just one line
        $users = User::factory()
                ->count(100)
                ->create()
                ->each(function ($user) {
                    $user->posts()->save(Post::factory()->make());
                    $user->posts()->save(UserSkill::factory()->make());
                });
    }
}
