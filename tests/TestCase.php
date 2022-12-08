<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Tests;

use Codedge\GoogleMerchant\Console\Commands\GoogleShoppingFeed;
use Codedge\GoogleMerchant\ServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Statamic\Extend\Manifest;
use Statamic\Facades\Collection;
use Statamic\Facades\Role;
use Statamic\Facades\User;
use Statamic\Providers\StatamicServiceProvider;
use Statamic\Statamic;

class TestCase extends OrchestraTestCase
{
    protected $shouldFakeVersion = true;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        \Illuminate\Console\Application::starting(function ($artisan) {
            $artisan->resolveCommands([GoogleShoppingFeed::class]);
        });

        parent::setUp();

        if ($this->shouldFakeVersion) {
            \Facades\Statamic\Version::shouldReceive('get')->andReturn('3.1');
            $this->addToAssertionCount(-1); // Dont want to assert this
        }
    }

    /**
     * Sign in a Statamic user.
     *
     * @param  array  $permissions
     * @return mixed
     */
    protected function signInUser($permissions = [])
    {
        $role = Role::make()->handle('test')->title('Test')->addPermission($permissions)->save();

        $user = User::make();
        $user->id(1)->email('test@mail.de')->assignRole($role);
        $this->be($user);

        return $user;
    }

    /**
     * Sign in a Statamic user as admin.
     *
     * @return mixed
     */
    protected function signInAdmin()
    {
        $user = User::make();
        $user->id(1)->email('test@mail.de')->makeSuper();
        $this->be($user);

        return $user;
    }

    protected function createCollection(string $handle = 'test_collection'): \Statamic\Entries\Collection
    {
        return Collection::make($handle)->save();
    }

    protected function deleteCollection(string $handle = 'test_collection'): bool
    {
        return Collection::findByHandle($handle)->delete();
    }

    protected function deleteSettingsFile(): bool
    {
        if (file_exists(storage_path('statamic-google-merchant/settings.yaml'))) {
            return unlink(storage_path('statamic-google-merchant/settings.yaml'));
        }

        return false;
    }

    /**
     * Load package service provider.
     *
     * @param  Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [

            StatamicServiceProvider::class,
            ServiceProvider::class,
        ];
    }

    /**
     * Load package alias.
     *
     * @param  Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Statamic' => Statamic::class,
        ];
    }

    /**
     * Load Environment.
     *
     * @param  Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app->make(Manifest::class)->manifest = [
            'codedge/statamic-google-merchant' => [
                'id'        => 'codedge/statamic-google-merchant',
                'namespace' => 'Codedge\\GoogleMerchant\\',
            ],
        ];
    }

    /**
     * Resolve the Application Configuration and set the Statamic configuration.
     *
     * @param  Application  $app
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $configs = [
            'assets', 'cp', 'forms', 'routes', 'static_caching',
            'sites', 'stache', 'system', 'users',
        ];

        foreach ($configs as $config) {
            $app['config']->set("statamic.$config", require(__DIR__."/../vendor/statamic/cms/config/{$config}.php"));
        }
        $app['config']->set('auth.providers.users.driver', 'statamic');
        $app['config']->set('statamic.stache.watcher', false);
        $app['config']->set('statamic.users.repository', 'file');
        $app['config']->set('statamic.stache.stores.users', [
            'class' => \Statamic\Stache\Stores\UsersStore::class,
            'directory' => __DIR__.'/__fixtures__/users',
        ]);

        // Setting the user repository to the default flat file system
        $app['config']->set('statamic.users.repository', 'file');

        // Assume the pro edition within tests
        $app['config']->set('statamic.editions.pro', true);

        Statamic::pushCpRoutes(function () {
            return require_once realpath(__DIR__.'/../routes/cp.php');
        });

        // Define magiclink config settings for all of our tests
        $app['config']->set('statamic-google-merchant', require(__DIR__.'/../config/config.php'));
    }
}
