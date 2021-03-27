<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Repositories;

use Codedge\GoogleMerchant\Contracts\ProductContract;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Statamic\Facades\YAML;
use Vitalybaev\GoogleMerchant\Product\Availability\Availability;
use Vitalybaev\GoogleMerchant\Product\Condition;

final class SettingsRepository
{
    const IS_ENABLED_KEY = 'enabled';
    const IS_COLLECTIONS_KEY = 'collections';
    const FILENAME_KEY = 'filename';
    const FIELDS_KEY = 'fields';

    private array $defaultValues;
    protected string $path;

    public function __construct(protected Filesystem $files)
    {
        $this->path = storage_path('statamic-google-merchant/settings.yaml');

        $this->defaultValues = [
            self::IS_ENABLED_KEY  => false,
            self::IS_COLLECTIONS_KEY => ['demo_collection'],
            self::FILENAME_KEY => 'google_product_feed.xml',
            self::FIELDS_KEY => [
                ProductContract::ID => '',
                ProductContract::GTIN => '',
                ProductContract::MPN => '',
                ProductContract::TITLE => '',
                ProductContract::DESC => '',
                ProductContract::PRICE => '',
                ProductContract::PRICE_SALE => '',
                ProductContract::IMAGE => '',
                ProductContract::IMAGE_ADDITIONAL => '',
                ProductContract::BRAND => '',
                ProductContract::CONDITION => Condition::NEW_PRODUCT,
                ProductContract::AVAILABILITY => Availability::IN_STOCK,
                ProductContract::AVAILABILITY_DATE => '',
                ProductContract::EXPIRATION_DATE => '',
            ],
        ];
    }

    public function isEnabled(): bool
    {
        return $this->get()->get(self::IS_ENABLED_KEY);
    }

    public function collections(): array
    {
        return $this->get()->get(self::IS_COLLECTIONS_KEY);
    }

    public function filename(): string
    {
        return $this->get()->get(self::FILENAME_KEY);
    }

    public function get(): Collection
    {
        if (! $this->files->exists($this->path)) {
            return collect($this->defaultValues);
        }

        return collect(YAML::parse($this->files->get($this->path)));
    }

    public function fields(): array
    {
        return $this->get()->get(self::FIELDS_KEY);
    }

    public function put($content)
    {
        if (! $this->files->isDirectory($dir = dirname($this->path))) {
            $this->files->makeDirectory($dir);
        }

        return $this->files->put($this->path, YAML::dump($content->all()));
    }
}
