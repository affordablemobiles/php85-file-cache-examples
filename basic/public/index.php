<?php

var_dump(
    opcache_is_script_cached_in_file_cache(__FILE__)
);

/**
 * EXPECT: bool(true)
 */