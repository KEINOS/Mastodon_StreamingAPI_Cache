<?php

declare(strict_types=1);

namespace KEINOS\Tests;

final class ConstructorTest extends TestCase
{
    public function testDefaultInstantiation()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $this->assertIsObject($cache);
    }

    public function testSetArgumentAsString()
    {
        $this->expectException(\TypeError::class);
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache('namespace');
    }

    public function testSetNamespaceAsString()
    {
        $settings = [
            'namespace' => hash('md5', strval(time())),
        ];
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache($settings);
        $this->assertIsObject($cache);
    }

    public function testSetPrefixAsString()
    {
        $settings = [
            'prefix' => "10",
        ];
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache($settings);
        $this->assertIsObject($cache);
    }

    public function testSetTtlAsString()
    {
        $settings = [
            'ttl_cache' => '10',
        ];
        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache($settings);
        $this->assertIsObject($cache);
    }

    public function testSetTtlAsInteger()
    {
        $settings = [
            'ttl_cache' => 10,
        ];
        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache($settings);
        $this->assertIsObject($cache);
    }
}
