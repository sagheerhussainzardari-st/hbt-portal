<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => "Artificial Intelligence"
            ],
            [
                'name' => "Machine Learning"
            ],
            [
                'name' => "Data Science"
            ],
            [
                'name' => "Programming"
            ],
            [
                'name' => "IoT (Internet of Things)"
            ],
            [
                'name' => "E-Commerce / Amazon"
            ],
            [
                'name' => "Digital Marketing"
            ],
            [
                'name' => "Web Development + Designing"
            ],
            [
                'name' => "Graphic Designing"
            ],
            [
                'name' => "UI/UX Design"
            ],
            [
                'name' => "Film Making"
            ],
            [
                'name' => "Photography"
            ],
            [
                'name' => "Video Editing + Animation"
            ]
        ]);
    }
}
