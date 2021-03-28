<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Widgets;

use Codedge\GoogleMerchant\Repositories\SettingsRepository;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use Statamic\Widgets\Widget;

final class GoogleMerchant extends Widget
{
    public function __construct(protected SettingsRepository $settingsRepository)
    {
    }

    public function html()
    {
        $exists = false;
        $count = 0;

        $feedFile = storage_path($this->settingsRepository->filename());

        if(file_exists($feedFile)) {
            $xml = new SimpleXMLElement(file_get_contents($feedFile));
            $exists = true;
            $count = count($xml->channel->item);
        }

        return view('gm::cp.widgets.google-merchant-feed', compact("exists", "count"));
    }
}
