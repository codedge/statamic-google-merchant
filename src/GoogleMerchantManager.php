<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant;

use Codedge\GoogleMerchant\Models\Feed;
use Vitalybaev\GoogleMerchant\Feed as GoogleMerchantFeed;

final class GoogleMerchantManager
{
    public static function createFeed(array $collections): GoogleMerchantFeed
    {
        $feed = new Feed(config('app.name').' Feed', config('app.url'), '');

        return $feed->create($collections);
    }
}
