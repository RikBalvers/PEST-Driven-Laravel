<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\User;
use App\Models\Video;

it('has courses', function () {
    // Arrange
    $user = User::factory()
        ->has(Course::factory()->count(2), 'purchasedCourses')
        ->create();

    // Act & Assert
    expect($user->purchasedCourses)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Course::class);
});
