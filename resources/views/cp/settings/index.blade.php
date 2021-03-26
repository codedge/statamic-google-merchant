@extends('statamic::layout')
@section('title', Statamic::crumb(__('gm::cp.settings.settings'), 'Google Merchant'))

@section('content')
    <header class="mb-3">
        <h1>{{ __('gm::cp.settings.headline') }}</h1>
        <p class="text-sm text-grey mb-2">
            {{ __('gm::cp.settings.configure_your_needs') }}
        </p>
    </header>

    <gm-settings
        method="patch"
        action="{{ cp_route('gm.update') }}"
        index-url="{{ cp_route('dashboard') }}"
        :initial-enabled="{{ Statamic\Support\Str::bool($enabled) }}"
        :initial-collections="{{ json_encode($collections) }}"
        initial-filename="{{ $filename }}"
        :initial-fields="{{ json_encode($fields) }}"
    ></gm-settings>
@endsection
