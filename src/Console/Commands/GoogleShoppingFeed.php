<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Console\Commands;

use Codedge\GoogleMerchant\GoogleMerchantManager;
use Codedge\GoogleMerchant\Repositories\SettingsRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

final class GoogleShoppingFeed extends Command
{
    protected $signature = 'google-merchant:feed:generate';
    protected $description = 'Generate the Google Shopping Feed xml file.';

    public function __construct(
        protected SettingsRepository $settingsRepository
    ) {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->settingsRepository->isEnabled()) {
            $feed = GoogleMerchantManager::createFeed($this->settingsRepository->collections());
            Storage::disk('public')->put($this->settingsRepository->filename(), $feed->build());

            $this->info('Google Merchant Feed generated successfully.');
        }
    }
}
