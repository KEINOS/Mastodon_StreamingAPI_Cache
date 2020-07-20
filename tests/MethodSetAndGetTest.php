<?php

declare(strict_types=1);

namespace KEINOS\Tests;

final class MethodSetAndGetTest extends TestCase
{

    public function testGetUndefinedValue()
    {
        $key_exist = hash('md5', strval(time()));
        $value = hash('md5', strval(time()));

        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $cache->set($key_exist, $value);

        $key_unknown = 'unknown_' . hash('md5', strval(time()));
        $result = $cache->get($key_unknown);
        $this->assertNull($result);
    }

    public function testSetArrayValue()
    {
        $key   = hash('md5', strval(time()));
        $value = [
            hash('md5', strval(time()))
        ];

        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $cache->set($key, $value);

        $expect = $value;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
    }

    public function testSetIntegerKey()
    {
        $key   = intval(time());
        $value = hash('md5', strval(time()));
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();

        $this->expectException(\TypeError::class);
        $cache->set($key, $value);
    }

    public function testSetNullValue()
    {
        $key   = hash('md5', strval(time()));
        $value = null;
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();

        // We don't except "null" values
        $this->expectException(\Exception::class);
        $cache->set($key, $value);
    }

    public function testSetObjectValue()
    {
        $key   = hash('md5', strval(time()));
        $value = [
            hash('md5', strval(time()))
        ];
        $obj = json_decode(json_encode($value)); // JSON object

        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $cache->set($key, $obj);

        $expect = $obj;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
    }

    public function testSetRandomKeyAndValue()
    {
        $key   = hash('md5', strval(time()));
        $value = hash('md5', strval(time()));

        $cache  = new \KEINOS\MSTDN_TOOLS\Cache\Cache();
        $cache->set($key, $value);

        $expect = $value;
        $actual = $cache->get($key);
        $this->assertSame($expect, $actual);
    }
}
