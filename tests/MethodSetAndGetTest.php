<?php

declare(strict_types=1);

namespace KEINOS\Tests;

final class MethodSetAndGetTest extends TestCase
{
    public function testArrayValue()
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

    public function testObjectValue()
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

    public function testSetIntegerKey()
    {
        $key   = intval(time());
        $value = hash('md5', strval(time()));
        $cache = new \KEINOS\MSTDN_TOOLS\Cache\Cache();

        $this->expectException(\TypeError::class);
        $cache->set($key, $value);
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
