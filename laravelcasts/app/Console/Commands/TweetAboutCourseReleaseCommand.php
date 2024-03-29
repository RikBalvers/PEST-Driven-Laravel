<?php

namespace App\Console\Commands;

use App\Models\Course;
use Illuminate\Console\Command;
use App\Services\Twitter\TwitterFacade as Twitter;

class TweetAboutCourseReleaseCommand extends Command
{
    protected $signature = 'tweet:about-course-release {courseId}';

    protected $description = 'Tweet about a course release.';

    public function handle()
    {
        $course = Course::findOrFail($this->argument('courseId'));

        Twitter::tweet("[TESTING] I just released $course->title 🎉 Check it out on ".route('page.course-details', $course));
    }
}
