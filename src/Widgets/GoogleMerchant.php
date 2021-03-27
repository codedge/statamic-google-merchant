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
        $xml = new SimpleXMLElement(Storage::disk('public')->get($this->settingsRepository->filename()));

        ray($xml);

        return view('gm::widgets.google-merchant-feed');
    }
}
