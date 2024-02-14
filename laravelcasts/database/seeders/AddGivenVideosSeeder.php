<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Seeder;

class AddGivenVideosSeeder extends Seeder
{
    public function run(): void
    {
        if ($this->isDataAlreadyGiven()) {
            return;
        }

        $laravelForBeginnersCourse = Course::where('title', 'Laravel For Beginners')->firstOrFail();
        $advancedLaravelCourse = Course::where('title', 'Advanced Laravel')->firstOrFail();
        $tddTheLaravelWayCourse = Course::where('title', 'TDD The Laravel Way')->firstOrFail();

        Video::insert([
            // Laravel For Beginners Videos
            [
                'course_id' => $laravelForBeginnersCourse->id,
                'slug' => 'getting-started',
                'vimeo_id' => '330287829',
                'title' => 'Getting Started with Laravel',
                'description' => 'Kickstart your Laravel journey by learning the basics and setting up your first Laravel project.',
                'duration_in_min' => 10,
            ],
            [
                'course_id' => $laravelForBeginnersCourse->id,
                'slug' => 'building-first-app',
                'vimeo_id' => '330287830',
                'title' => 'Building Your First Laravel Application',
                'description' => 'Follow along as we build a simple Laravel application from scratch, covering key concepts.',
                'duration_in_min' => 15,
            ],
            [
                'course_id' => $laravelForBeginnersCourse->id,
                'slug' => 'laravel-essentials',
                'vimeo_id' => '330287831',
                'title' => 'Essential Laravel Features',
                'description' => 'Explore essential features in Laravel that every beginner should know to become proficient.',
                'duration_in_min' => 12,
            ],

            // Advanced Laravel Videos
            [
                'course_id' => $advancedLaravelCourse->id,
                'slug' => 'service-container',
                'vimeo_id' => '330287832',
                'title' => 'Mastering the Service Container',
                'description' => 'Dive deep into Laravel\'s service container and learn advanced techniques for dependency injection.',
                'duration_in_min' => 20,
            ],
            [
                'course_id' => $advancedLaravelCourse->id,
                'slug' => 'laravel-pipelines',
                'vimeo_id' => '330287833',
                'title' => 'Understanding Laravel Pipelines',
                'description' => 'Unlock the power of Laravel pipelines and how they can streamline your application workflows.',
                'duration_in_min' => 18,
            ],
            [
                'course_id' => $advancedLaravelCourse->id,
                'slug' => 'application-security',
                'vimeo_id' => '330287834',
                'title' => 'Securing Your Laravel Application',
                'description' => 'Learn advanced security practices to protect your Laravel application from common threats.',
                'duration_in_min' => 25,
            ],

            // TDD The Laravel Way Videos
            [
                'course_id' => $tddTheLaravelWayCourse->id,
                'slug' => 'understanding-tdd',
                'vimeo_id' => '330287835',
                'title' => 'Understanding Test-Driven Development (TDD)',
                'description' => 'Grasp the fundamentals of TDD and its importance in building robust Laravel applications.',
                'duration_in_min' => 15,
            ],
            [
                'course_id' => $tddTheLaravelWayCourse->id,
                'slug' => 'implementing-tdd-laravel',
                'vimeo_id' => '330287836',
                'title' => 'Implementing TDD in Laravel',
                'description' => 'Learn how to apply TDD principles in a Laravel project, ensuring code quality and reliability.',
                'duration_in_min' => 22,
            ],
            [
                'course_id' => $tddTheLaravelWayCourse->id,
                'slug' => 'tdd-mindset',
                'vimeo_id' => '330287837',
                'title' => 'Developing a TDD Mindset',
                'description' => 'Cultivate a TDD mindset and understand the benefits it brings to your development process.',
                'duration_in_min' => 18,
            ],
        ]);
    }

    private function isDataAlreadyGiven(): bool
    {
        $laravelForBeginnersCourse = Course::where('title', 'Laravel For Beginners')->firstOrFail();
        $advancedLaravelCourse = Course::where('title', 'Advanced Laravel')->firstOrFail();
        $tddTheLaravelWayCourse = Course::where('title', 'TDD The Laravel Way')->firstOrFail();

        return
            $laravelForBeginnersCourse->videos()->count() == 3
            && $advancedLaravelCourse->videos()->count() == 3
            && $tddTheLaravelWayCourse->videos()->count() == 3;
    }
}
