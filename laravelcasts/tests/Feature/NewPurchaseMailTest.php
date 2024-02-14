<?php

use App\Mail\NewPurchaseMail;
use App\Models\Course;

it('includs purchase course details', function () {
    $course = Course::factory()->create();

    $mail = new NewPurchaseMail($course);

    $mail->assertSeeInText("Thanks for purchasing $course->title");
    $mail->assertSeeInText("Login");
    $mail->assertSeeInHtml(route('login'));
});
