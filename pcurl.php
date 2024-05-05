#!/usr/bin/php
<?php

require_once __DIR__. DIRECTORY_SEPARATOR. 'autoload.php';

$request = new CliCurl();

$url = $argv[1];

if ($argc == 1) {
    echo "\033[33mUsage: curl.php <domain>\033[0m". PHP_EOL;
    exit(1);
} else {
    try {
        $result = $request->processWebRequest($url);
        echo "\033[32m";
        var_dump($result);
        echo "\033[0m";
    } catch (Exception $e) {
        echo "\033[31mError: {$e->getMessage()}\033[0m". PHP_EOL;
        exit(2);
    }
}
