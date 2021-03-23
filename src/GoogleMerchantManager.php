<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant;

use Statamic\Tags\Collection\Entries;
use Statamic\Tags\Parameters;
use Vitalybaev\GoogleMerchant\Feed;
use Vitalybaev\GoogleMerchant\Product;

final class GoogleMerchantManager
{
    public function __construct()
    {
    }

    public static function createFeed()
    {
        $feed = new Feed("Test", "", "");

        $items = (new Entries(new Parameters([
            'from' => 'sofa_tables|wood_flies'
        ])))->get();

        ray($items);

        $items->each(function ($item, $key) {
            $product = new Product();

            dd($item);

            //$product->setId($ite)
        });
    }
}
