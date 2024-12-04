<?php

/**
 * pre-warm the opcache with all files in the project,
 *  using Symfony's Finder.
 * 
 * This can be simplified a lot, if this PR gets merged:
 *  https://github.com/php/php-src/pull/16862
 * As currently, `opcache_compile_file(...)` is loading
 *  functions into the global context, which requires us
 *  to omit files that are already loaded, or we get
 *  "function already exists" errors.
 */

/**
 * To prevent "function already exists" errors,
 *  as mentioned above:
 * 
 * Trick composer into thinking we've already
 *  any helper scripts, usually loaded automatically
 *  when the auto-loader is registered.
 */

$filesToLoad = require __DIR__ . '/vendor/composer/autoload_files.php';

// Prevent composer autoloading files...
foreach ($filesToLoad as $fileIdentifier => $file) {
    $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
}

/**
 * -----------
 */

require __DIR__ . '/vendor/autoload.php';

$finder = (new Symfony\Component\Finder\Finder())
    ->files()
    ->name('/\.php$/')
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(false)
    ->exclude([
        'vendor/composer',
    ])
    ->notPath([
        // e.g. 'fuel/core/bootstrap.php',
    ])
    ->in(__DIR__);

foreach($finder as $file) {
    $filepath = $file->getRealPath();
    echo "Compiling file " . $file->getRelativePathname() . " ... " .
        (
            opcache_compile_file($filepath) ? 'OK' : 'FAIL'
        ) . "\n";
}