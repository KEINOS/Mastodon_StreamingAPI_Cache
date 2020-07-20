<?php

/**
 * Main script.
 *
 * Overly-Cautious Development of Hello World!.
 *
 * @standard PSR2
 */

declare(strict_types=1);

namespace KEINOS\Sample;

require_once __DIR__ . '/../vendor/autoload.php';

use KEINOS\MSTDN_TOOLS\Cache\Cache;

$cache = new Cache();

$expect = 'hoge';
$key    = 'foo';
$cache->set($key, $expect);
$actual = $cache->get($key);

echo 'Expect: ' . $expect . PHP_EOL;
echo 'Actual: ' . $actual . PHP_EOL;

echo 'Deleting key ... ', $key, '... ' . ($cache->delete($key) ? 'OK' : 'NG'), PHP_EOL;
echo 'Check deleted ... ', (($cache->get($key) === null) ? 'OK' : 'NG'), PHP_EOL;

echo 'Set value and clear ... ';

// Set value
$expect = 'hoge';
$key    = 'foo';
$cache->set($key, $expect);
$actual = $cache->get($key);
if($expect !== $actual){
    throw new \Exception('Failed to save cache.');
}
// Clear all the cache
echo ($cache->clear() ? 'Cleared' : 'Failed'), PHP_EOL;
echo 'Check deleted ... ', (($cache->get($key) === null) ? 'OK' : 'NG'), PHP_EOL;
