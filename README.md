[![](https://travis-ci.org/KEINOS/Mastodon_StreamingAPI_Cache.svg?branch=master)](https://travis-ci.org/KEINOS/Mastodon_StreamingAPI_Cache "View Build Status on Travis")
[![](https://img.shields.io/coveralls/github/KEINOS/Mastodon_StreamingAPI_Cache)](https://coveralls.io/github/KEINOS/Mastodon_StreamingAPI_Cache?branch=master "Code Coverage on COVERALLS")
[![](https://img.shields.io/scrutinizer/quality/g/KEINOS/Mastodon_StreamingAPI_Cache/master)](https://scrutinizer-ci.com/g/KEINOS/Mastodon_StreamingAPI_Cache/?branch=master "Code quality in Scrutinizer")
[![](https://img.shields.io/packagist/php-v/keinos/mastodon-streaming-api-parser)](https://github.com/KEINOS/Mastodon_StreamingAPI_Cache/blob/master/.travis.yml "Version Support")

# Simple Key-Value Store Class for Caching

This is a simple Key-Value store PHP class for a simple purposes such as caching.

- Notes: Not aimed to use for a simultaneous massive access. This is a wrapper class of [symfony/cache component](https://symfony.com/doc/current/components/cache.html).

## Install

```bash
composer require keinos/mastodon-streaming-api-cache
```

## Usage

```php
<?php

namespace KEINOS\Sample;

require_once __DIR__ . '/../vendor/autoload.php';

// Instantiate
use KEINOS\MSTDN_TOOLS\Cache\Cache;
$cache = new Cache();

// Set value to the cache
$key   = 'foo';
$value = 'bar';
$cache->set($key, $value);

// Get value from the cache
$actual = $cache->get($key);
$expect = $value;
echo ($expect === $actual) ? 'OK' : 'NG', PHP_EOL;

// Delete value from the cache
$result = $cache->delete($key);

// Clear all the caches
$result = $cache->clear();

```

## Package Information

- Packagist: https://packagist.org/packages/keinos/mastodon-streaming-api-cache
- Source: https://github.com/KEINOS/Mastodon_StreamingAPI_Cache
- Issues: https://github.com/KEINOS/Mastodon_StreamingAPI_Cache/issues
- License: [MIT](https://github.com/KEINOS/Mastodon_StreamingAPI_Cache/blob/master/LICENSE)
- Authors: [KEINOS and the contributors](https://github.com/KEINOS/Mastodon_StreamingAPI_Cache/graphs/contributors)
