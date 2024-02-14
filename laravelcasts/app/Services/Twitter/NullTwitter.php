<?php

namespace App\Services\Twitter;

use App\Services\Twitter\TwitterClientInterface;

class NullTwitter implements TwitterClientInterface
{
    public function tweet(string $status): array
    {
        return [];
    }
}
