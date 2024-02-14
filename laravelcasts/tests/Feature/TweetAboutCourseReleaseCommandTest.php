<?php

use App\Console\Commands\TweetAboutCourseReleaseCommand;
use App\Models\Course;
use App\Services\Twitter\TwitterFacade as Twitter;

it('tweets about release for provided course', function () {
    Twitter::fake();
    $course = Course::factory()->create();

    $this->artisan(TweetAboutCourseReleaseCommand::class, ['courseId' => $course->id]);

    Twitter::assertTweetSent("[TESTING] I just released $course->title 🎉 Check it out on " . route('page.course-details', $course));
});
