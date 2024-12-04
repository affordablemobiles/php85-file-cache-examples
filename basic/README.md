## Basic Example

### Contents

* [App Engine configuration file](./app.yaml) (`app.yaml`)
* [PHP INI](./php.ini) (`php.ini`)
* [composer configuration](./composer.json) (`composer.json`)
    * See `scripts -> gcp-build` that runs automatically at deploy time.
* [prewarm script](./prewarm.php) (`prewarm.php`)
    * Customisable script that calls `opcache_compile_file` at deploy time.
* [index file](./public/index.php) (`public/index.php`)
    * Outputs `bool(true)` if able to load from file cache at runtime.