<?php

declare(strict_types=1);

namespace KEINOS\Tests;

final class MethodSetAndGetTest extends TestCase
{

    public function testGetUndefinedValue()
    {
        $cache     = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $key_exist = hash('md5', strval(time()));
        $value     = hash('md5', strval(time()));
        $cache->set($key_exist, $value);

        $key_unknown = 'unknown_' . hash('md5', strval(time()));
        $result = $cache->get($key_unknown);
        $this->assertNull($result);
    }

    public function testSetArrayValue()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $key   = hash('md5', strval(time()));
        $value = [
            hash('md5', strval(time()))
        ];

        $cache->set($key, $value);

        $expect = $value;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
    }

    public function testSetIntegerKey()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $key   = intval(time());
        $value = hash('md5', strval(time()));

        $this->expectException(\TypeError::class);
        $cache->set($key, $value);
    }

    public function testSetNullValue()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $key   = hash('md5', strval(time()));
        $value = null;

        // We don't except "null" values
        $this->expectException(\Exception::class);
        $cache->set($key, $value);
    }

    public function testSetObjectValue()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $key   = hash('md5', strval(time()));
        $value = [
            hash('md5', strval(time()))
        ];
        $obj = json_decode(json_encode($value)); // JSON object

        $cache->set($key, $obj);

        $expect = $obj;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
    }

    public function testSetRandomKeyAndValue()
    {
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $key   = hash('md5', strval(time()));
        $value = hash('md5', strval(time()));
        $cache->set($key, $value);

        $expect = $value;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
    }
}
