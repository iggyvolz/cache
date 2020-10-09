<?php

namespace Amp\Cache;

interface Cache
{
    /**
     * Gets a value associated with the given key.
     *
     * If the specified key doesn't exist implementations MUST succeed the resulting promise with `null`.
     *
     * @param $key string Cache key.
     *
     * @return string|null Returns the cached value nor `null` if it doesn't exist or fails with a
     * CacheException on failure.
     */
    public function get(string $key): ?string;

    /**
     * Sets a value associated with the given key. Overrides existing values (if they exist).
     *
     * The eventual resolution value of the resulting promise is unimportant. The success or failure of the promise
     * indicates the operation's success.
     *
     * @param $key string Cache key.
     * @param $value string Value to cache.
     * @param $ttl int Timeout in seconds. The default `null` $ttl value indicates no timeout. Values less than 0 MUST
     * throw an \Error.
     */
    public function set(string $key, string $value, int $ttl = null): void;

    /**
     * Deletes a value associated with the given key if it exists.
     *
     * Implementations SHOULD return boolean `true` or `false` to indicate whether the specified key existed at the time
     * the delete operation was requested. If such information is not available, the implementation MUST resolve the
     * promise with `null`.
     *
     * Implementations MUST transparently succeed operations for non-existent keys.
     *
     * @param $key string Cache key.
     *
     * @return bool|null Returns `true` / `false` to indicate whether the key existed or fails with a
     * CacheException on failure. May also return `null` if that information is not available.
     */
    public function delete(string $key): ?bool;
}
