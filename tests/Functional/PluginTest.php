<?php

namespace nlxSessionOptimizer\Tests;

use nlxSessionOptimizer\nlxSessionOptimizer as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'nlxSessionOptimizer' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['nlxSessionOptimizer'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
