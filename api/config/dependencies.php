<?php

$files = glob(__DIR__ . '/common/*.php');

$configs = array_map(
    static function ($file) {
        return require $file;
    },
    $files
);

return array_merge_recursive(...$configs);


