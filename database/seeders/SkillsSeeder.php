<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\Skill;
use App\Models\User;
use App\Models\Post;
use App\DataProviders\SkillDataProvider;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Skill::insert(SkillDataProvider::Skills());
        // $users = Skill::factory()
        //         ->count(100)
        //         ->create();

    }
}
