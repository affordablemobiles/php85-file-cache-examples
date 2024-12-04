<?php

var_dump(
    opcache_is_script_cached_in_file_cache(__FILE__)
);

var_dump(
    opcache_is_script_cached_in_file_cache(__DIR__ . '/../vendor/symfony/finder/Finder.php')
);

/**
 * EXPECT:
 * 
 * bool(true)
 * bool(true)
 */