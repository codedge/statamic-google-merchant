<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Console\Commands;

use Codedge\GoogleMerchant\GoogleMerchantManager;
use Codedge\GoogleMerchant\Repositories\SettingsRepository;
use Illuminate\Console\Command;

final class GoogleShoppingFeed extends Command
{
    protected $signature = 'google-merchant:feed:generate';
    protected $description = 'Generate the Google Shopping Feed xml file.';

    public function __construct(protected SettingsRepository $settingsRepository )
    {
        parent::__construct();
    }

    public function handle()
    {
        $feed = GoogleMerchantManager::createFeed($this->settingsRepository->collections());
    }
}
