<?php

namespace Codedge\GoogleMerchant\Console\Tests;

use Codedge\GoogleMerchant\Tests\TestCase;

final class GoogleShoppingFeedCommandTest extends TestCase
{
    /** @test */
    public function it_can_run_command_successful()
    {
        $this->artisan('google-merchant:feed:generate')->assertExitCode(0);
    }
}
