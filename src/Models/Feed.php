<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Models;

use Codedge\GoogleMerchant\Contracts\ProductContract;
use Codedge\GoogleMerchant\Repositories\SettingsRepository;
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
            $product->setId($this->getFieldContent(ProductContract::ID, $item));
            $product->setGtin($this->getFieldContent(ProductContract::GTIN, $item));
            $product->setMpn($this->getFieldContent(ProductContract::MPN, $item));
            $product->setTitle($this->getFieldContent(ProductContract::TITLE, $item));
            $product->setPrice(
                $this->getFieldContent(ProductContract::PRICE, $item) . ' ' . config('google-merchant.currency.iso_code')
            );
            $product->setDescription($this->getFieldContent(ProductContract::DESC, $item));
            $product->setBrand($this->getFieldContent(ProductContract::BRAND, $item));
            $product->setCondition($this->getFieldContent(ProductContract::CONDITION, $item));
            $product->setAvailability($this->getFieldContent(ProductContract::AVAILABILITY, $item));
            $product->setPrice($this->getFieldContent(ProductContract::PRICE, $item));
            $product->setSalePrice($this->getFieldContent(ProductContract::PRICE_SALE, $item));
            $product->setBrand($this->getFieldContent(ProductContract::BRAND, $item));
            $product->setLink($item->absoluteUrl());
            $product->setImage($this->getFieldContent(ProductContract::IMAGE, $item));
            $product->setAdditionalImage($this->getFieldContent(ProductContract::IMAGE_ADDITIONAL, $item));

            $product->setAttribute(
                'availability_date', $this->getFieldContent(ProductContract::AVAILABILITY_DATE, $item)
            );
            $product->setAttribute('expiration_date', $this->getFieldContent(ProductContract::EXPIRATION_DATE, $item));

            $feed->addProduct($product);
        });

        return $feed;
    }

    /**
     * Get the content of a product field either from the configuration or from the entry itelf.
     * Handling of static values or {{ handle }} included.
     *
     * @param string $fieldName
     * @param Entry $entry
     *
     * @return string Content of the field
     */
    private function getFieldContent(string $fieldName, Entry $entry): string
    {
        if($entry->get($fieldName)) {
            return $entry->get($fieldName);
        }

        /** @var SettingsRepository $settingsRepository */
        $settingsRepository = resolve(SettingsRepository::class);
        $settingsField = $settingsRepository->get()->get('fields')[$fieldName] ?: '';

        // if {{ handle }} is entered
        preg_match('/{{(.*)}}/', $settingsField, $matches);
        if(isset($matches[1]) && $name = trim($matches[1])) {
            return $entry->get($name);
        }

        return $settingsField;
    }
}
