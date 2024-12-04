## opcache.file_cache_read_only examples

Examples of pre-warming the opcache on PHP 8.5, for:
* Linux based containers, i.e. Docker
* Application code is read-only after container build

These examples are primarily for [Google Cloud](https://cloud.google.com/)'s [App Engine](https://cloud.google.com/appengine), which builds Docker containers using [buildpacks](https://github.com/GoogleCloudPlatform/buildpacks), which include all application code that remains read-only at runtime.

### Examples

* [Basic example](./basic/) with single `public/index.php` file.
* [Intermediate example](./finder/) using [Symfony's Finder](https://github.com/symfony/finder) to compile all project files.