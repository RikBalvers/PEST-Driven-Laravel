<?php

namespace App\Services\Twitter;

use Tests\Feature\Fakes\TwitterFake;
use Illuminate\Support\Facades\Facade;

class TwitterFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TwitterClientInterface::class;
    }

    public static function fake()
    {
        self::swap(new TwitterFake);
    }
}
