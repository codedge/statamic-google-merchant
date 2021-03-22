<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Console\Commands;

use Codedge\GoogleMerchant\GoogleMerchantManager;
use Illuminate\Console\Command;

final class GoogleShoppingFeed extends Command
{
    protected $signature = 'google-merchant:feed:generate';
    protected $description = 'Generate the Google Shopping Feed xml file.';

    public function __construct(protected GoogleMerchantManager $gmm)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->gmm->createFeed();
    }
}
