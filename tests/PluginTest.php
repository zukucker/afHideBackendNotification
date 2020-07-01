<?php

namespace afHideBackendNotification\Tests;

use afHideBackendNotification\afHideBackendNotification as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'afHideBackendNotification' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['afHideBackendNotification'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
