<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Http\Controllers\Cp;

use Codedge\GoogleMerchant\Repositories\SettingsRepository;
use Illuminate\Http\Request;
use Statamic\Facades\Collection;

final class SettingsController extends BaseCpController
{
    public function __construct(Request $request, protected SettingsRepository $settingsRepository)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $this->authorize('view gm settings');

        return view(
            'gm::cp.settings.index',
            $this->settingsRepository->get()->all()
        );
    }

    public function update(Request $request)
    {
        $this->authorize('view gm settings');

        $request->validate([
            'enabled'    => ['required', 'boolean'],
            'collections'    => ['present', 'array'],
        ]);

        $this->settingsRepository->put($request);

        session()->flash('success', __('gm::cp.settings.updated_successfully'));

        return [
            'redirect' => cp_route('gm.index'),
        ];
    }
}
