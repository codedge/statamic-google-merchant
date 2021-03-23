@extends('statamic::layout')
@section('title', Statamic::crumb(__('gm::cp.settings.settings'), 'Google Merchant'))

@section('content')
    <header class="mb-3">
        <h1>{{ __('gm::cp.settings.headline') }}</h1>
        <p class="text-sm text-grey mb-2">
            {{ __('magiclink::cp.settings.configure_your_needs') }}
        </p>
    </header>

@endsection
