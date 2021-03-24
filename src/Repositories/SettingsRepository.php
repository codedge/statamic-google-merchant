<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Repositories;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Statamic\Facades\YAML;

final class SettingsRepository
{
    const IS_ENABLED_KEY = 'enabled';
    const IS_COLLECTIONS_KEY = 'collections';

    private array $defaultValues;
    protected string $path;

    public function __construct(protected Filesystem $files)
    {
        $this->path = storage_path('statamic-google-merchant/settings.yaml');

        $this->defaultValues = [
            self::IS_ENABLED_KEY  => false,
            self::IS_COLLECTIONS_KEY => [],
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

    public function get(): Collection
    {
        if (! $this->files->exists($this->path)) {
            return collect($this->defaultValues);
        }

        return collect(YAML::parse($this->files->get($this->path)));
    }

    public function put($content)
    {
        if (! $this->files->isDirectory($dir = dirname($this->path))) {
            $this->files->makeDirectory($dir);
        }

        return $this->files->put($this->path, YAML::dump($content->all()));
    }
}
