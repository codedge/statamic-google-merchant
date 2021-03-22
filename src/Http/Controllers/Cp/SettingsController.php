<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Http\Controllers\Cp;

final class SettingsController extends BaseCpController
{
    public function index()
    {
        $this->authorize('view gm settings');

        $settings = $this->settingsRepository->get();

        return view('gm::cp.settings.index', $settings->all());
    }
}
