<?php

declare(strict_types=1);

namespace KEINOS\Tests;

final class MethodDeleteTest extends TestCase
{
    public function testSetAndDelete()
    {
        $key   = hash('md5', strval(time()));
        $value = hash('md5', strval(time()));

        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $cache->set($key, $value);

        // Set value and check before deletion
        $expect = $value;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual, 'Failed before deletion.');

        // Delete
        $this->assertTrue($cache->delete($key));

        // Should return null.
        $this->assertNull($cache->get($key), 'Deleted key should return null.');
    }
}
