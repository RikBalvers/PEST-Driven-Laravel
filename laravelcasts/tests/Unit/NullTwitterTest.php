<?php

namespace Tests\Unit;
use App\Services\Twitter\NullTwitter;

it('returns empty array for a tweet call', function () {
    expect(new NullTwitter())
        ->tweet('Our tweet')
        ->toBeArray()
        ->toBeEmpty();
});
