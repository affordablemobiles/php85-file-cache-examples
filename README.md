## opcache.file_cache_read_only examples

Examples of pre-warming the opcache on PHP 8.5, for:
* Linux based containers, i.e. Docker
* Application code is read-only after container build

These examples are primarily for [Google Cloud](https://cloud.google.com/)'s [App Engine](https://cloud.google.com/appengine), which builds Docker containers using [buildpacks](https://github.com/GoogleCloudPlatform/buildpacks), which include all application code that remains read-only at runtime.

### Examples

* [Basic example](./basic/) with single `public/index.php` file.
* [Intermediate example](./finder/) using [Symfony's Finder](https://github.com/symfony/finder) to compile all project files.

### Notes

The opcache file based cache is only valid for the same **build** of PHP (not just a specific version match), so it's important that the opcache is generated at deploy / container build time with the exact same build of PHP.

This is due to `zend_system_id` being included in both the file path:

https://github.com/php/php-src/blob/85f7e5477a5cd81c221c3cc451bc76bdf3c8ac83/ext/opcache/zend_file_cache.c#L981-L1006

And also, in the cache files themselves:

https://github.com/php/php-src/blob/85f7e5477a5cd81c221c3cc451bc76bdf3c8ac83/ext/opcache/zend_file_cache.c#L954-961

You can debug this by setting `opcache.log_verbosity_level=4`.

On startup, if the file cache is enabled, you'll see a message with the PHP build ID:

https://github.com/php/php-src/blob/85f7e5477a5cd81c221c3cc451bc76bdf3c8ac83/ext/opcache/ZendAccelerator.c#L3332-L3335