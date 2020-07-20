<?php

declare(strict_types=1);

namespace KEINOS\Tests;

final class MethodClearTest extends TestCase
{
    public function testDefaultInstantiation()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $this->assertTrue($cache->clear());
    }

    public function testSetAndClear()
    {
        $key   = hash('md5', strval(time()));
        $value = hash('md5', strval(time()));

        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $cache->set($key, $value);

        $expect = $value;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
        $this->assertTrue($cache->clear());

        $this->assertNull($cache->get($key), 'Should return null since the vales were cleared.');
    }
}
