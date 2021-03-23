<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant;


use Codedge\GoogleMerchant\Models\Feed;

final class GoogleMerchantManager
{
    public function __construct()
    {
    }

    public static function createFeed()
    {
        $feed = new Feed(config('app.name') . ' Feed', config('app.url'), '');

        $feed->create('sofa_tables');

    }
}
