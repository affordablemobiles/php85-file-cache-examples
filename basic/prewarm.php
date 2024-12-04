<?php

$finder = [
    realpath(__DIR__ . '/public/index.php'),
];

foreach($finder as $file) {
    $filepath = $file->getRealPath();
    echo "Compiling file " . $file->getRelativePathname() . " ... " .
        (
            opcache_compile_file($filepath) ? 'OK' : 'FAIL'
        ) . "\n";
}