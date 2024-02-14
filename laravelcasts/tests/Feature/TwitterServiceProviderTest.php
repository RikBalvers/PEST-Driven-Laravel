<?php

use App\Services\Twitter\NullTwitter;
use App\Services\Twitter\TwitterClientInterface;

it('returns null twitter client for testing env', function () {
    app()->bind(TwitterClientInterface::class, NullTwitter::class);

    expect(app(TwitterClientInterface::class))
        ->toBeInstanceOf(NullTwitter::class);
});
