<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant;

use Codedge\GoogleMerchant\Console\Commands\GoogleShoppingFeed;

use Statamic\Facades\CP\Nav;
use Statamic\Facades\Permission;
use Statamic\Providers\AddonServiceProvider;

final class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp'  => __DIR__.'/../routes/cp.php',
    ];

    protected $commands = [
        GoogleShoppingFeed::class,
    ];

    protected $viewNamespace = 'gm';

    public function boot()
    {
        parent::boot();

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gm');

        $this->bootNavigation();
        $this->bootPermissions();

        if ( $this->app->runningInConsole() ) {
            $this->publishes( [
                __DIR__ . '/../config/config.php' => config_path( 'google-merchant.php' ),
            ], 'config' );

            //Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/statamic-google-merchant/views'),
            ], 'views');
        }
    }

    protected function schedule($schedule)
    {
        parent::schedule($schedule);
        $schedule->command('google-merchant:feed:generate')->daily();
    }

    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/config.php', 'google-merchant' );

        $this->app->bind(GoogleMerchantManager::class, function () {
            return new GoogleMerchantManager();
        });
    }

    private function bootNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->create('Google Merchant')
                ->icon('link')
                ->section('Tools')
                ->children([
                    Nav::item(__('gm::cp.settings.settings'))->route('gm.index')
                       ->can('view gm settings'),
                ]);
        });
    }

    private function bootPermissions(): void
    {
        $this->app->booted(function () {
            Permission::group('gm_general', __('gm::cp.permissions.settings'), function () {
                Permission::register('view gm settings', function (\Statamic\Auth\Permission $permission) {
                    $permission
                        ->label(__('gm::cp.permissions.view_settings'))
                        ->description(__('gm::cp.permissions.view_settings_description'));
                });
            });
        });
    }
}
