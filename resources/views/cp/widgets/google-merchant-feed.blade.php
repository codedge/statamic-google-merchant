<div class="card p-0 h-full">
    <header class="flex justify-between items-center p-2 border-b">
        <h2 class="flex items-center">
            <div class="h-6 w-6 mr-1 text-grey-50">
                <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Google My Business icon</title><path d="M3.273 1.636c-.736 0-1.363.492-1.568 1.16L0 9.272c0 1.664 1.336 3 3 3a3 3 0 003-3c0 1.664 1.336 3 3 3a3 3 0 003-3c0 1.65 1.35 3 3 3 1.664 0 3-1.336 3-3 0 1.664 1.336 3 3 3s3-1.336 3-3l-1.705-6.476a1.646 1.646 0 00-1.568-1.16zm8.729 9.326c-.604 1.063-1.703 1.81-3.002 1.81-1.304 0-2.398-.747-3-1.806-.604 1.06-1.702 1.806-3 1.806-.484 0-.944-.1-1.363-.277v8.232c0 .9.736 1.637 1.636 1.637h17.454c.9 0 1.636-.737 1.636-1.637v-8.232a3.48 3.48 0 01-1.363.277c-1.304 0-2.398-.746-3-1.804-.602 1.058-1.696 1.804-3 1.804-1.299 0-2.394-.75-2.998-1.81zm5.725 3.765c.808 0 1.488.298 2.007.782l-.859.859a1.623 1.623 0 00-1.148-.447c-.98 0-1.772.827-1.772 1.806 0 .98.792 1.807 1.772 1.807.882 0 1.485-.501 1.615-1.191h-1.615v-1.16h2.826c.035.196.054.4.054.613 0 1.714-1.147 2.931-2.88 2.931a3 3 0 010-6z"/></svg>
            </div>
            <span>Google Merchant Feed</span>
        </h2>
    </header>

    <section class="px-2 py-1">
    @if($exists)
        <div>
            <div class="mb-2 flex">
                <div class="w-1/2">{{ __('gm::cp.widget.feed_exists') }}</div>
                <div class="text-green-500">{{ __('gm::cp.widget.yes') }}</div>
            </div>
            <div class="mb-2 flex">
                <div class="w-1/2">{{ __('gm::cp.widget.products_in_feed') }}:</div>
                <div class="text-green-500">{{ $count }}</div>
            </div>
        </div>
    @else
        <div class="text-red-500">
            {{ __('gm::cp.widget.not_existing') }}
        </div>
    @endif
    </section>
</div>
