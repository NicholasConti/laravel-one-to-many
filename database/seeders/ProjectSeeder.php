<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->project_name = $faker->sentence(3);
            $project->description = $faker->text(200);
            $project->slug = Str::slug($project->project_name, '-');
            $project->programming_languages = $faker->words(rand(1, 3), true);
            $project->start_date = $faker->date();
            $project->save();
        }
    }
}
