<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Models;

use Codedge\GoogleMerchant\Contracts\ProductContract;
use Statamic\Entries\Entry;
use Statamic\Entries\EntryCollection;
use Statamic\Tags\Collection\Entries;
use Vitalybaev\GoogleMerchant\Feed as GoogleMerchantFeed;
use Statamic\Tags\Parameters;
use Vitalybaev\GoogleMerchant\Product;

final class Feed
{
    public function __construct(
        protected string $title, protected string $link, protected string $description
    )
    {
    }

    public function create(array $collections): GoogleMerchantFeed
    {
        $entries = $this->getEntries(new Parameters([
            'from' => $collections
        ]));

        return $this->buildFeed($entries);
    }

    protected function getEntries(Parameters $params): EntryCollection
    {
        $entries = (new Entries($params))->get();

        return $entries->reject(function (Entry $entry) {
            return $entry->get('google_product_exclude') === true;
        });
    }

    protected function buildFeed(EntryCollection $entries): GoogleMerchantFeed
    {
        $feed = new GoogleMerchantFeed($this->title, $this->link, $this->description);

        $entries->each(function (Entry $item, $key) use (&$feed) {
            $product = new Product();
            $product->setId($item->get(ProductContract::ID));
            $product->setGtin($item->get(ProductContract::GTIN));
            $product->setMpn($item->get(ProductContract::MPN));
            $product->setTitle($item->get(ProductContract::TITLE));
            $product->setPrice($item->get(ProductContract::PRICE));
            $product->setDescription($item->get(ProductContract::DESC));
            $product->setBrand($item->get(ProductContract::BRAND));
            $product->setCondition($item->get(ProductContract::CONDITION, 'new'));
            $product->setAvailability(
                $item->get(ProductContract::AVAILABILITY, Product\Availability\Availability::IN_STOCK)
            );
            $product->setLink($item->absoluteUrl());

            $feed->addProduct($product);
        });

        return $feed;
    }
}
