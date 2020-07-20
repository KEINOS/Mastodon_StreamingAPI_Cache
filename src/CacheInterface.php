<?php

/**
 * This file is part of the keinos/mastodon-streaming-api-cache package.
 *
 * - Authors, copyright, license, usage and etc.:
 *   - See: https://github.com/KEINOS/Mastodon_StreamingAPI_Cache/
 */

declare(strict_types=1);

namespace KEINOS\MSTDN_TOOLS\Cache;

/**
 * Interface to use \KEINOS\MSTDN_TOOLS\Cache\Cache class.
 * Describe and define public methods here as a user manual/reference.
 *
 * Note: This is a wrapper class of Symfony\Component\Cache to use as a simple
 *       key-value store purposes.
 */
interface CacheInterface
{
    public const CACHE_TTL_DEFAULT = 60 * 60 * 1; // 1 hour
    public const CACHE_PREFIX_DEFAULT = 'mstdn_tools_cache_';

    /**
     * Instantiates the class.
     *
     * - Optional keys of the arg:
     *   - "ttl"   : Life time in seconds of the value to cache.
     *   - "prefix": Namespace pre-fix of the cache file.
     *
     * @param array<string,int|string> $settings   (Optional) Available keys see above.
     */
    public function __construct(array $settings=[]);

    /**
     * Clears all the caches in the cache-pool.
     *
     * @return bool  True on success.
    */
    public function clear();

    /**
     * Delete a value from cache-pool.
     *
     * @param  string $key      The key of the value to delete.
     * @return bool             True on success.
     */
    public function delete(string $key);

    /**
     * Get cached value.
     *
     * @param  string $key      The key to restore the cached value.
     * @return null|mixed       Cached value.
     */
    public function get(string $key);

    /**
     * Set value to the cache-pool.
     *
     * @param  string $key     The key to store value.
     * @param  mixed  $value   The value to be stored.
     * @return void
     * @throws \Exception      If the value is null. We don't except "null" value.
     */
    public function set(string $key, $value);
}
