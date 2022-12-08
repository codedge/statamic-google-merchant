<?php

namespace Codedge\GoogleMerchant\Tests;

class SettingsControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->signInAdmin();
        $this->createCollection();
    }

    public function tearDown(): void
    {
        $this->deleteCollection();
        $this->deleteSettingsFile();
        parent::tearDown();
    }

//    /** @test */
//    public function it_can_show_index()
//    {
//        $this->get(cp_route('gm.index'))
//             ->assertOk()
//             ->assertSee(__('gm::cp.general'))
//             ->assertSee(__('gm::cp.settings.headline'));
//    }
//
//    /** @test */
//    public function it_cannot_show_index_without_permissons()
//    {
//        $this->signInUser();
//
//        $this->get(cp_route('gm.index'))
//             ->assertRedirect(cp_route('index'));
//    }
//
//    /** @test */
//    public function it_can_update_settings_without_error(): void
//    {
//        $payload = [
//            'enabled'    => true,
//            'collections' => [
//                'test_collection',
//            ],
//            'filename' => 'test_feed.xml',
//            'fields' => [
//                'google_product_condition' => 'new',
//                'google_product_availability' => 'in stock',
//            ],
//        ];
//
//        $this->patch(cp_route('gm.update'), $payload)->assertOk();
//
//        $this->get(cp_route('gm.index'))
//             ->assertOk()
//             ->assertSee($payload['filename'])
//             ->assertSee($payload['collections'][0]);
//    }
}
