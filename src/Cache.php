<?php
/**
 * This file is the main class of the keinos/mastodon-streaming-api-cache package.
 *
 * - Reference of the public methods of this class to use:
 *   - See: ./CacheInterface.php
 * - Authors, copyright, license, usage and etc.:
 *   - See: https://github.com/KEINOS/Mastodon_StreamingAPI_Cache/
 *
 * Debug:
 * - To test and analyze the scripts:
 *   - Run: `$ composer test all verbose` (Composer is required)
 */

declare(strict_types=1);

namespace KEINOS\MSTDN_TOOLS\Cache;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Simple Caching Class.
 */
class Cache implements CacheInterface
{
    /** @var FilesystemAdapter */
    protected $cache_pool;
    /** @var string */
    protected $namespace;
    /** @var int */
    protected $ttl;

    public function __construct(array $settings=[])
    {
        $ttl = self::CACHE_TTL_DEFAULT;
        if (isset($settings['ttl'])) {
            $ttl = intval($settings['ttl']);
        }
        $this->ttl = $ttl;

        $prefix = self::CACHE_PREFIX_DEFAULT;
        if (isset($settings['prefix'])) {
            $prefix = $settings['prefix'];
        }

        $id_hash = strval(hash_file('md5', __FILE__));
        if (isset($settings['namespace'])) {
            $id_hash = $settings['namespace'];
        }
        $this->namespace = $prefix . $id_hash;

        // Set file system adapter object
        $this->cache_pool = new FilesystemAdapter($this->namespace, $this->ttl);
    }

    public function clear(): bool
    {
        return $this->cache_pool->clear();
    }

    public function delete(string $key): bool
    {
        return $this->cache_pool->deleteItem($key);
    }

    public function get(string $key)
    {
        $cache_item = $this->cache_pool->getItem($key);

        if (! $cache_item->isHit()) {
            return null;
        }
        return $cache_item->get();
    }

    public function set(string $key, $value): void
    {
        if (null === $value) {
            $msg = 'Null value given. "null" value is NOT allowed to cache.';
            throw new \Exception($msg);
        }

        $cache_item = $this->cache_pool->getItem($key);

        $cache_item->set($value);
        $this->cache_pool->save($cache_item);
    }
}
