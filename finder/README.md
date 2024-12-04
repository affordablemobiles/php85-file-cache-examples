## Symfony Finder Example

### Contents

* [App Engine configuration file](./app.yaml) (`app.yaml`)
* [PHP INI](./php.ini) (`php.ini`)
* [composer configuration](./composer.json) (`composer.json`)
    * See `scripts -> gcp-build` that runs automatically at deploy time.
* [prewarm script](./prewarm.php) (`prewarm.php`)
    * Customisable script that calls `opcache_compile_file` at deploy time.
    * Finds all project files to compile using [Symfony's Finder](https://github.com/symfony/finder).
* [index file](./public/index.php) (`public/index.php`)
    * Outputs `bool(true)` if able to load from file cache at runtime.